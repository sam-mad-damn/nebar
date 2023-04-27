let headerItems = document.querySelectorAll(".tab-header_btn");
let header = document.querySelectorAll(".tab-header__item");
let resDates = document.querySelectorAll(".date");
let resTime = document.querySelector(".time");
let resDuration = document.querySelector(".duration");
let btnDate = document.querySelectorAll(".btndate");
let data;

function clearTabs() {
  headerItems.forEach((item) => item.classList.remove("active"));
  document
    .querySelectorAll(".tab-body__item")
    .forEach((item) => item.classList.remove("active"));
}

document.addEventListener("click", (e) => {
  if (e.target.classList.contains("times")) {
    e.target.checked = true;
  }
});

let clickHeaderItem = (e) => {
  clearTabs();
  document
    .querySelector(`#hed-${e.currentTarget.dataset.target}`)
    .classList.add("active");
  document
    .querySelector(`#${e.currentTarget.dataset.target}`)
    .classList.add("active");

  resDates.forEach((item) => {
    item.textContent = `Дата: ${document.querySelector("#datepicker").value}`;
  });
  resDuration.textContent = `Продолжительность: ${
    document.querySelector("#inputDuration").value
  } ч.`;
  if (document.querySelector(".times:checked")) {
    resTime.textContent = `Время: ${
      document.querySelector(".times:checked").value
    }`;
  }

  if (
    document.querySelector("#datepicker").value == "" ||
    document.querySelector("#inputDuration").value == "" ||
    document.querySelector(".times:checked") == null
  ) {
    document.querySelector("#book").disabled = true;
  } else {
    document.querySelector("#book").disabled = false;
  }
};

headerItems.forEach((item) => item.addEventListener("click", clickHeaderItem));

btnDate.forEach((item) => {
  item.addEventListener("click", async () => {
    let valueDate = document.querySelector("#datepicker").value;
    let valueId = document.querySelector("#inputId").value;
    let params = new URLSearchParams({
      date: JSON.stringify(
        valueDate.replace(/^(\d+).(\d+).(\d+)$/, `$3-$2-$1`)
      ),
      id: JSON.stringify(valueId),
    });
    data = await getData("/app/tables/client/book/arrange.save.php", params);

    document.querySelectorAll("[name='time']").forEach((item) => {
      data.forEach((elem) => {
        for (let i = 0; i < Number(elem.duration); i++) {
          if (
            `${item.value}:00` >= elem.time &&
            Number(item.value.substring(0, 2)) <=
              Number(elem.time.substring(0, 2)) + Number(elem.duration) - 1
          ) {
            item.disabled = true;
          }
        }
      });
    });
  });
});
