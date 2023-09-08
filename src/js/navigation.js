export default function initNavigation() {
  const header = document.querySelector('header');

  if (!header) {
    return;
  }

  const hamburgerOpenButton = header.querySelector('.navigation__hamburger');
  const navWrapper = header.querySelector('.navigation__nav-wrapper');
  const menuItems = header.querySelectorAll(
    '.navigation__nav .menu-item-has-children'
  );

  const openMenu = (event) => {
    document.body.classList.add('navigation--mobile-is-open');
    navWrapper.classList.add('navigation__nav-wrapper--is-open');
    event.setAttribute('aria-expanded', 'true');
    event.setAttribute('aria-label', 'Zamknij menu');
  };

  const closeMenu = (event) => {
    document.body.classList.remove('navigation--mobile-is-open');
    navWrapper.classList.remove('navigation__nav-wrapper--is-open');
    event.setAttribute('aria-expanded', 'false');
    event.setAttribute('aria-label', 'Otwórz menu');
  };

  const toggleMenu = (e) => {
    if (e.target.getAttribute('aria-expanded') === 'false') {
      openMenu(e.target);
    } else {
      closeMenu(e.target);
    }
  };

  hamburgerOpenButton.addEventListener('click', toggleMenu);

  window.addEventListener('resize', () => {
    if (window.innerWidth >= 1025) {
      closeMenu(hamburgerOpenButton);
    }
  });

  menuItems.forEach((menuItem) => {
    menuItem.addEventListener('click', (e) => {
      menuItems.forEach((item) => {
        if (item !== e.target) {
          item.classList.remove('menu-item--open');
        }
      });

      if (!e.target.classList.contains('menu-item--open')) {
        e.target.classList.add('menu-item--open');
      } else {
        e.target.classList.remove('menu-item--open');
      }
    });
  });

  document.body.addEventListener('click', (e) => {
    if (!e.target.closest('.menu-item-has-children')) {
      menuItems.forEach((item) => {
        item.classList.remove('menu-item--open');
      });
    }

    if (e.target.closest('.navigation__pseudo-element')) {
      closeMenu(hamburgerOpenButton);
    }
  });
}
