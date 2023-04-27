document.addEventListener("click", async (e) => {
  if (e.target.classList.contains("trash")) {
    id = e.target.dataset.productId;
    wId = e.target.dataset.weightId;
    action = "del";
    let {products, totalCount, totalPrice} = await postJSON("/app/tables/client/order/order.save.php", { "product_id":id,"weight_id":wId},action)
    e.target.closest(".basket-position").remove();
    document.querySelector(".totalPrice").textContent = `Итог: ${totalPrice}₽`;
    document.querySelector(
      ".totalCount"
    ).textContent = `Итоговое кол-во: ${totalCount}шт.`;
  }
});

document.addEventListener("click", async (e) => {
  if (e.target.classList.contains("clear")) {
    action = "clear";
    let {products} = await postJSON("/app/tables/client/order/order.save.php", { },action)
    document
      .querySelectorAll(".basket-position")
      .forEach((elem) => elem.remove());
    document.querySelector(".totalPrice").style.display = `none`;
    document.querySelector(".clear").style.display = "none";
    document.querySelector(".totalCount").textContent = `Заказ пустой`;
  }
});

document.addEventListener("click", async (e) => {
  if (e.target.classList.contains("plus")) {
    id = e.target.dataset.productId;
    wId = e.target.dataset.weightId;
    action = "add";
    let {products, totalCount, totalPrice} = await postJSON("/app/tables/client/order/order.save.php", { "product_id":id,"weight_id":wId},action)
    document.querySelector(`#count-${id}-${wId}`).textContent = `${products.count}`;
    document.querySelector(`[data-price-position="${id}-${wId}"]`).textContent = `${products.price_position}₽`;

    document.querySelector(".totalPrice").textContent = `Итог: ${totalPrice}₽`;
    document.querySelector(
      ".totalCount"
    ).textContent = `Итоговое кол-во: ${totalCount}шт.`;
  }
});
document.addEventListener("click", async (e) => {
  if (e.target.classList.contains("minus")) {
    id = e.target.dataset.productId;
    wId = e.target.dataset.weightId;
    action = "dec";
    let {products, totalCount, totalPrice} = await postJSON("/app/tables/client/order/order.save.php", { "product_id":id,"weight_id":wId},action)
    document.querySelector(`#count-${id}-${wId}`).textContent = `${products.count}`;
    document.querySelector(`[data-price-position="${id}-${wId}"]`).textContent = `${products.price_position}₽`;

    document.querySelector(".totalPrice").textContent = `Итог: ${totalPrice}₽`;
    document.querySelector(
      ".totalCount"
    ).textContent = `Итоговое кол-во: ${totalCount}шт.`;
  }
});

