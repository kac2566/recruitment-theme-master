import Splide from '@splidejs/splide';
import '@splidejs/splide/dist/css/splide.min.css';

document.querySelectorAll('.opinion-slider-block').forEach((sliderBlock) => {
  const splideSlides = sliderBlock.querySelectorAll(
    '.opinion-slider-block__slide'
  );
  const splideList = sliderBlock.querySelector('.opinion-slider-block__list');
  const splideTrack = sliderBlock.querySelector('.opinion-slider-block__track');

  if (!splideTrack || !splideList || !splideSlides) return;

  sliderBlock.classList.add('splide');
  splideList.classList.add('splide__list');
  splideTrack.classList.add('splide__track');
  splideSlides.forEach((slide) => slide.classList.add('splide__slide'));

  new Splide(sliderBlock, {
    perPage: 1,
    perMove: 1,
    pagination: true,
    arrows: false,
    autoplay: true,
    interval: 3000,
    type: 'loop',
  }).mount();
});
