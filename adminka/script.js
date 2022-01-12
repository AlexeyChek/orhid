const buttonAdd = document.querySelector('.option-add');
const buttonRemove = document.querySelector('.option-remove');
const optionsMain = document.querySelector('.options-main');

var countOptions = 1;

const optionsTitles = [];
optionsTitles[0] = document.querySelector('.option-title');
const optionsValues = [];
optionsValues[0] = document.querySelector('.option-value');

const addOptionList = ()=> {
  optionsTitles[countOptions - 1] = document.querySelector(`[name="option${countOptions}"]`);
  optionsTitles[countOptions - 1].addEventListener('change', setOptionsInput);

  optionsValues[countOptions - 1] = document.querySelector(`[name="value${countOptions}"]`);
  optionsValues[countOptions - 1].addEventListener('change', setOptionsInput);
};

const removeOptionList = ()=> {
  optionsTitles.pop();
  optionsValues.pop();
};

const addOption = ()=> {
  countOptions++;
  var text = `
  <div class="option option${countOptions}">
  <input class="admin-input option-input option-title" name="option${countOptions}" placeholder="название характеристики" required>
  <input class="admin-input option-input option-value" name="value${countOptions}" placeholder="описание характеристики" required>
  </div>
  `;
  buttonAdd.insertAdjacentHTML('beforebegin', text);
  addOptionList();
};

const removeOption = ()=> {
  var elem = document.querySelector(`.option${countOptions}`);
  elem.parentNode.removeChild(elem);
  countOptions--;
  removeOptionList();
};

const setOptionsInput = ()=> {
  var text = '{';
  for( let i=0 ; i < optionsTitles.length ; i++) {
    text = text + `\\"${optionsTitles[i].value}\\": \\"${optionsValues[i].value}\\", `;
  }
  text = text.slice(0, -2) + '}';
  optionsMain.value = text;
};

optionsMain.value = "{}";

buttonAdd.addEventListener('click', addOption);
buttonRemove.addEventListener('click', removeOption);
optionsTitles[0].addEventListener('change', setOptionsInput);
optionsValues[0].addEventListener('change', setOptionsInput);


