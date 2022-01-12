const navigation = document.querySelector('.navigation');
const navigationMenu = document.querySelector('.navigation__menu');
const navigationMenuLine = document.querySelector('.navigation__menu-line');

const cartButton = document.querySelector('.cart__button');
const modal = document.querySelector('.modal');
const modalOverlay = document.querySelector('.modal__overlay');
const modalClose = document.querySelector('.modal__close');

const navigationButton = document.querySelector('.navigation__button');
const navigationListNext = document.querySelector('.navigation__list_next');

const modalOkButton = document.querySelector('.modal-ok__button');
const modalOk = document.querySelector('.modal-ok');

if (modalOkButton) modalOkButton.addEventListener('click', ()=> {
  modalOk.classList.remove('modal-ok_visible');
});


const openModal = ()=> {
  modal.classList.add('modal_visible');
};

const closeModal = ()=> {
  modal.classList.remove('modal_visible');
};

navigationMenu.addEventListener('click', ()=>{
  navigation.classList.toggle('navigation_visible');
  navigationMenuLine.classList.toggle('navigation__menu-line_visible');
  closeNavigationNext();
});

if(cartButton) cartButton.addEventListener('click', openModal);
if(modalOverlay) modalOverlay.addEventListener('click', closeModal);
if(modalClose) modalClose.addEventListener('click', closeModal);

document.addEventListener('keydown', (event) => {
  if (event.code === 'Escape') {
    closeModal();
  }
});

const toggleNavigationNext = ()=> {
  console.log('click');
  navigationButton.classList.toggle('navigation__button_active');
  navigationListNext.classList.toggle('navigation__list_next_active');
};

const closeNavigationNext = ()=> {
  navigationButton.classList.remove('navigation__button_active');
  navigationListNext.classList.remove('navigation__list_next_active');
};

const navigationListener = toggleNavigationNext;

const navigationListenerOn = ()=> {
  navigationButton.addEventListener('click', navigationListener, false);
};

const navigationListenerOff = ()=> {
  navigationButton.removeEventListener('click', navigationListener, false);
};

if (document.documentElement.clientWidth < 1200) navigationListenerOn();

let width = window.innerWidth;

window.addEventListener("resize", function() {
    if(window.innerWidth < 1200 && width >= 1200) {
      navigationListenerOn();
      width = window.innerWidth;
    } else if(window.innerWidth >= 1200 && width < 1200) {
      navigationListenerOff();
      width = window.innerWidth;
    }
  }, false);

$('.form').each(function () {
    $(this).validate({
      rules: {
        'user-name': {
          required: true,
          minlength: 2
        },
        'user-email': {
          required: true,
          email: true
        },
        'user-phone': {
          required: true,
          minlength: 17
        }
      },
      messages: {
        'user-name': "Пожалуйста укажите имя",
        'user-email': {
          required: "На почту придет подтверждение заказа",
          email: "Неверный адрес"
        },
        'user-phone': {
          required: "Телефон необходим для уточнения заказа",
          minlength: "Неверный номер"
        }
      },

    });
  });

  $('.tel').mask('+7 (000) 000-0000');

