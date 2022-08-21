
let homePage = document.querySelector('#homepage');

// home page js 
function handleCategoryMenu() {
    let categoryMenu = document.querySelector('.categories');
    document.addEventListener('click', function (e) {
        if (e.target.contains(categoryMenu)) {
            categoryMenu.classList.toggle('active');
        }
        else {
            categoryMenu.classList.remove('active');
        }
    })
}
handleCategoryMenu()
let sliderList = document.querySelector('.slider_list');
var flkty = new Flickity(sliderList, {
    // options
    cellAlign: 'left',
    contain: true,
    autoPlay: 3000,
    pauseAutoPlayOnHover: false
});

let subSliderList = document.querySelector('.subslider_list');
var subflkt = new Flickity(subSliderList, {
    // options
    autoPlay: 2500,
    wrapAround: true,
    pauseAutoPlayOnHover: false,
    cellAlign: 'left',
    lazyLoad: 4,
    prevNextButtons: false,
    pageDots: false,
});
// Header
window.addEventListener('scroll', function () {
    let currentValue = window.scrollY;
    let headerTop = document.querySelector('.header_top');
    let header = document.querySelector('.header')
    if (window.scrollY >= 50) {
        header.classList.add('active');
        headerTop.style.height = "0";
    }
    else {
        header.classList.remove('active');
        headerTop.style.height = 50 + "px";
        headerTop.style.transition = 0.4 + "s";
    }
})
// Handle detail page
let mainImg = document.querySelector('.mainprod-img');
let proImgList = document.querySelectorAll('.sub_img img');
console.log(proImgList);
proImgList.forEach((item, index) => {
    item.addEventListener('click', () => {
        let src = item.getAttribute('src');
        mainImg.src = src;
    })
})