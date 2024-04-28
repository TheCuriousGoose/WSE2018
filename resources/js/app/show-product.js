document.addEventListener('DOMContentLoaded', () => {
    const colorOptions = document.querySelectorAll('.color-choice-box');
    const symbolOptions = document.querySelectorAll('.symbol-choice-box');

    colorOptions.forEach(option => option.addEventListener('click', handleColorClick));
    symbolOptions.forEach(option => option.addEventListener('click', handleSymbolClick));
});

function handleColorClick(event) {
    const option = event.target;
    const rawImageUrl = document.querySelector('meta[name="image-raw-link"]').getAttribute('content');
    const selectedOption = document.querySelector('.color-choice-box.selected');
    const productImageElement = document.getElementById('product-image');
    const color = option.dataset.colorName;

    if (option.classList.contains('selected')) {
        return;
    }

    selectedOption.classList.remove('selected');
    selectedOption.querySelector('input').removeAttribute('checked')

    option.classList.add('selected');
    option.querySelector('input').checked = true;

    let modifiedImageURL = rawImageUrl.replace('{color}', color);
    productImageElement.src = modifiedImageURL;
}

function handleSymbolClick(event){
    const option = event.target.closest('.symbol-choice-box');
    const selectedOption = document.querySelector('.symbol-choice-box.selected');
    const productSymbolElement = document.getElementById('product-symbol');
    const symbolImage = option.dataset.symbolImage;

    if (option.classList.contains('selected')) {
        return;
    }

    selectedOption.classList.remove('selected');
    selectedOption.querySelector('input').removeAttribute('checked')

    option.classList.add('selected');
    option.querySelector('input').checked = true;

    productSymbolElement.src = symbolImage;
}



