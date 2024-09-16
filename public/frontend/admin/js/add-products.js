function updateFactoryOptions() {
    const category = document.getElementById('category').value;
    const factorySelect = document.getElementById('factory');
    const target = document.getElementById('target');

    // Clear existing options
    factorySelect.innerHTML = '';

    // Kiểm tra và thay đổi lớp của target
    if (category === 'phone') {
        target.classList.replace('block', 'hidden');
    } else {
        target.classList.replace('hidden', 'block');
    }

    let options = [];
    if (category === 'laptop') {
        options = [
            { value: 'dell', text: 'Dell' },
            { value: 'acer', text: 'Acer' }
        ];
    } else if (category === 'phone') {
        options = [
            { value: 'apple', text: 'Apple' },
            { value: 'samsung', text: 'Samsung' }
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
