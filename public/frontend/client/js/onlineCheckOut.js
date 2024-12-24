// Đối tượng `Validator`
console.log("onlineCheckOut.js");

function Validator(options) {
    function getParent(element, selector) {
        while (element.parentElement) {
            // nếu tồn tại parent thì lặp tiếp
            if (element.parentElement.matches(selector))
                return element.parentElement;
            element = element.parentElement;
        }
    }
    var selectorRules = {};

    // Hàm thực hiện validate (báo lỗi)
    function validate(inputElement, rule) {
        var errorMessage;
        var errorElement = getParent(
            inputElement,
            options.formGroupSelector,
        ).querySelector(options.errorSelector);

        //Lấy qua từng rule của selector
        var rules = selectorRules[rule.selector];

        // Lặp qua từng rule & kiểm tra, Nếu có 1 lỗi thì dừng luôn
        // Xem xét kiểu dữ liệu input
        for (var i = 0; i < rules.length; i++) {
            switch (inputElement.type) {
                case "radio":
                case "checkbox":
                    errorMessage = rules[i](
                        formElement.querySelector(rule.selector + ":checked"),
                    );
                    break;
                default:
                    errorMessage = rules[i](inputElement.value);
            }
            if (errorMessage) break;
        }
        if (errorMessage) {
            errorElement.innerText = errorMessage;
            getParent(inputElement, options.formGroupSelector).classList.add(
                "invalid",
            );
        } else {
            errorElement.innerText = "";
            getParent(inputElement, options.formGroupSelector).classList.remove(
                "invalid",
            );
        }
        return !errorMessage;
    }

    // Lấy element của form cần validate
    var formElement = document.querySelector(options.form);
    if (formElement) {
        formElement.onsubmit = function (e) {
            e.preventDefault();

            var isFormValid = true;

            //Thực hiện lặp qua từng rules và validate
            options.rules.forEach(function (rule) {
                var inputElement = formElement.querySelector(rule.selector);

                var isValid = validate(inputElement, rule);
                if (!isValid) isFormValid = false;
            });

            // Trả về kết quả
            if (isFormValid) {
                if (typeof options.onSubmit === "function") {
                    //Nếu không có trường nào bị disable thì xóa not disable đi
                    var enableInputs = formElement.querySelectorAll(
                        "[name]:not([disable])",
                    );
                    var formValues = Array.from(enableInputs).reduce(function (
                        values,
                        input,
                    ) {
                        switch (input.type) {
                            case "radio":
                                if (input.matches(":checked")) {
                                    values[input.name] = input.value;
                                    break;
                                } else values[input.name] = "";
                            case "checkbox":
                                if (!input.matches(":checked")) {
                                    values[input.name] = "";
                                    return values;
                                }
                                if (!Array.isArray(values[input.name]))
                                    values[input.name] = input.value;
                                else values[input.name].push(input.value);
                            case "file":
                                values[input.name] = input.file;
                                break;
                            default:
                                values[input.name] = input.value;
                        }

                        return values;
                    }, {});
                    options.onSubmit(formValues);
                }
            }
        };

        // Lặp qua mỗi rule và xử lý (lắng nghe sự kiện blur, input, ...)
        options.rules.forEach(function (rule) {
            // Lưu lại các rules cho mỗi input
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElements = formElement.querySelectorAll(rule.selector);

            Array.from(inputElements).forEach(function (inputElement) {
                // Xử lý mỗi khi người dùng nhập vào input
                inputElement.oninput = function () {
                    var errorElement = getParent(
                        inputElement,
                        options.formGroupSelector,
                    ).querySelector(options.errorSelector);
                    errorElement.innerText = "";
                    getParent(
                        inputElement,
                        options.formGroupSelector,
                    ).classList.remove("invalid");
                };
            });
        });
    }
}

// Định nghĩa rules
// Nguyên tắc của các rules:
// 1. Khi có lỗi => Trả ra message lỗi
// 2. Khi hợp lệ => Không trả ra cái gì cả (undefined)
Validator.isRequired = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            return value ? undefined : message || "Vui lòng nhập trường này";
        },
    };
};

Validator.minLength = function (selector, min, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min
                ? undefined
                : message || `Vui lòng nhập tối thiểu ${min} ký tự`;
        },
    };
};

Validator.isLength = function (selector, min, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.length == min
                ? undefined
                : message || `Vui lòng nhập đúng ${min} ký tự`;
        },
    };
};

Validator.isNumber = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\d+$/; // Chỉ chấp nhận số (các chữ số 0-9)
            return regex.test(value)
                ? undefined
                : message || "Vui lòng nhập số điện thoại hợp lệ";
        },
    };
};
