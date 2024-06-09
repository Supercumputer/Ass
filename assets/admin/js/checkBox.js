
const checked_input_all = document.querySelector(
  '.form-check-input[name="input_all"]'
);

const btn_checked_all = document.querySelector(".select-all");
const btn_unchecked_all = document.querySelector(".deselect-all");
const checked_inputs = document.querySelectorAll(
  '.form-check-input[name="input_item"]'
);

checked_input_all.addEventListener("change", function () {
  checked_inputs.forEach(function (checkbox) {
    checkbox.checked = checked_input_all.checked ? true : false;
  });
});

btn_checked_all.addEventListener("click", function () {
  checked_input_all.checked = true;
  checked_inputs.forEach(function (checkbox) {
    checkbox.checked = true;
  });
});

btn_unchecked_all.addEventListener("click", function () {
  checked_inputs.forEach(function (checkbox) {
    checkbox.checked = false;
  });
  checked_input_all.checked = false;
});

checked_inputs.forEach(function (checkbox) {
  checkbox.addEventListener("change", function () {
    if (
      checked_inputs.length >
      document.querySelectorAll('.form-check-input[name="input_item"]:checked')
        .length
    ) {
      checked_input_all.checked = false;
    } else {
      checked_input_all.checked = true;
    }
  });
});
