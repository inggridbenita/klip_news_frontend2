console.log("home");

const btnLogout = document.getElementById("btnLogout");
const newsContainer = document.getElementById("content");

btnLogout.addEventListener("click", async () => {
  const csrf_token = getMeta('csrf-token');
  const requestOptions = {
    method: 'POST',
  };
  let response = await fetch(`http://127.0.0.1:8000/api/logout?_token=${csrf_token}`, requestOptions);
  window.location.href = "/login";
});

const displayAllNews = async () => {
  let response = await fetch('http://127.0.0.1:5000/get_all_news');
  response = await response.text();
  let news = JSON.parse(response);
  news = news["news"];
  for (item of news) {
    const template = document.getElementById("newsTemplate");

    let category = convertCategoryToReadable(item["category"]);

    var clone = template.content.cloneNode(true);
    clone.querySelector("img").setAttribute("src", item["poster"]);
    clone.querySelector("p").innerHTML = item["title"];
    clone.querySelector(".category").innerHTML = category;
    clone.querySelector(".time").innerHTML = item["date"];
    newsContainer.append(clone);
  }
}

const init = () => {
  displayAllNews();
}
init();
