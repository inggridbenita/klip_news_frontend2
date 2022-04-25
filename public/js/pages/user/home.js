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

    item["date"] = Date.parse(item["date"]);
    item["date"] = new Date(item["date"]);
    const date = item["date"].getDate();
    const month = item["date"].getMonth();
    const year = item["date"].getUTCFullYear();
    const hours = item["date"].getHours();
    const minutes = item["date"].getMinutes();

    const weekday = convertWeekdayEnglishToBahasa(item["weekday"]);
    item["date"] = `${date} ${convertMonthIntToStringBahasa(month)} ${year} ${hours}:${minutes}`;
    clone.querySelector(".time").innerHTML = `${weekday}, ${item["date"].toString()}`;

    newsContainer.append(clone);
  }
}

const init = () => {
  displayAllNews();
}
init();
