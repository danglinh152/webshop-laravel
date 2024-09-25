function updateFactoryOptions() {
    const category = document.getElementById('category').value;
    const factorySelect = document.getElementById('factory');
    const target = document.getElementById('target');


    // Clear existing options
    factorySelect.innerHTML = '';

    // Kiểm tra và thay đổi lớp của target
    if (category === 'phone') {
        target.classList.replace('block', 'hidden');
    } else if (category === 'laptop') {
        target.classList.replace('hidden', 'block');
    }

    let options = [];
    if (category === 'laptop') {
        options = [
            { value: 'Dell', text: 'Dell' },
            { value: 'Acer', text: 'Acer' },
            { value: 'Macbook', text: 'Macbook' },
            { value: 'Asus', text: 'Asus' },
            { value: 'Lenovo', text: 'Lenovo' },
            { value: 'HP', text: 'HP' }

        ];
    }
    else if (category === 'phone') {
        options = [
            { value: 'Iphone', text: 'Iphone' },
            { value: 'Oppo', text: 'Oppo' },
            { value: 'Xiaomi', text: 'Xiaomi' },
            { value: 'Samsung', text: 'Samsung' }

        ];
    }
    else {
        options = [
            { value: 'Chưa xác định', text: '---' }
        ];
    }

    // Populate the factory select element with new options
    options.forEach(option => {
        const newOption = document.createElement('option');
        newOption.value = option.value;
        newOption.textContent = option.text;
        factorySelect.appendChild(newOption);
    });
}
