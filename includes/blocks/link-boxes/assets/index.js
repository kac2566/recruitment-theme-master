import Splide from '@splidejs/splide';
import '@splidejs/splide/dist/css/splide.min.css';

function isMobile() {
  return window.innerWidth <= 640;
}

function handleResize() {
  const isMobileDevice = isMobile();

  document.querySelectorAll('.link-boxes-block').forEach((linkBox) => {
    const splideSlides = linkBox.querySelectorAll(
      '.link-boxes-block--grid-view > a'
    );
    const splideList = linkBox.querySelector('.link-boxes-block--grid-view');
    const splideTrack = linkBox.querySelector('.link-boxes-block__track');

    if (!splideTrack || !splideList || !splideSlides) return;

    if (isMobileDevice) {
      linkBox.classList.add('splide');
      splideList.classList.add('splide__list');
      splideTrack.classList.add('splide__track');
      splideSlides.forEach((slide) => slide.classList.add('splide__slide'));

      new Splide(linkBox, {
        perPage: 1,
        perMove: 1,
        pagination: false,
        arrows: true,
        mediaQuery: 'min',
        breakpoints: {
          641: {
            destroy: true,
          },
        },
      }).mount();
    } else {
      linkBox.classList.remove('splide');
      splideList.classList.remove('splide__list');
      splideTrack.classList.remove('splide__track');
      splideSlides.forEach((slide) => slide.classList.remove('splide__slide'));
    }
  });
}

window.addEventListener('load', handleResize);
window.addEventListener('resize', handleResize);
