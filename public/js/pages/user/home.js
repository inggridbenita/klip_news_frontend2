console.log("home");

const newsContainer = document.getElementById("content");

const displayAllNews = async () => {
  let response = await fetch('http://127.0.0.1:5000/get_all_news');
  response = await response.text();
  let news = JSON.parse(response);
  news = news["news"];
  for (item of news) {
    const template = document.getElementById("newsTemplate");

    let category = convertCategoryToReadable(item["category"]);

    var clone = template.content.cloneNode(true);
    clone.querySelector("a").setAttribute("href", `/baca?id=${item["id"]}`);
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
