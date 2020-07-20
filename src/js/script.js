let profileLinks = document.querySelectorAll('.menu__list-lnk');

function changeProfileForm(e) {
  e.preventDefault();

  let links = document.querySelectorAll('.menu__list-lnk');
  let curLink = this;
  let linkToForm = this.getAttribute('href');
  let curForm = document.querySelector(linkToForm);
  let forms = document.querySelectorAll('.form form');

  forms.forEach(item => item.classList.add('disappear'));
  links.forEach(item => item.classList.remove('menu__list-lnk--active'));

  curForm.classList.remove('disappear');
  curLink.classList.add('menu__list-lnk--active');

}

profileLinks.forEach(item => {
  item.addEventListener('click', changeProfileForm);
})


let modal = document.querySelector('.modal');
let modalClose = document.querySelector('.modal__x');
let modalSign = document.querySelectorAll('.modal__sign');

modal.addEventListener('mouseover', () => modalClose.classList.add('modal__x--hovered'));
modal.addEventListener('mouseout', () => modalClose.classList.remove('modal__x--hovered'))

modal.addEventListener('click', () => {
  modal.classList.add('disappear');
  modalSign.forEach(item => item.classList.add('disappear'));
  document.body.style.overflow = '';
});

modalSign.forEach(item => {
  item.addEventListener('mouseover', (e) => e.stopPropagation());
  item.addEventListener('click', (e) => e.stopPropagation());
})

let signLinks = document.querySelectorAll('.user__panel-list-sign a');
signLinks.forEach(item =>
  item.addEventListener('click', (e) => {
    e.preventDefault();

    let curModal = document.querySelector(e.target.getAttribute('href'));

    modal.classList.remove('disappear');
    curModal.classList.remove('disappear');
    document.body.style.overflow = 'hidden';
  })
)

