console.log('home');

const newsContainer = document.getElementById('news-list');

const displayAllNews = async () => {
  let response = await fetch('http://127.0.0.1:5000/get_all_news');
  response = await response.text();
  let news = JSON.parse(response);
  news = news.news;
  // eslint-disable-next-line no-restricted-syntax
  for (item of news) {
    const template = document.getElementById('newsTemplate');

    const category = convertCategoryToReadable(item.category);

    const clone = template.content.cloneNode(true);
    clone.querySelector('a').setAttribute('href', `/baca?id=${item.id}`);
    clone.querySelector('img').setAttribute('src', item.poster);
    clone.querySelector('p').innerHTML = item.title;
    clone.querySelector('.category').innerHTML = category;
    clone.querySelector('.time').innerHTML = parseDateFromBackEnd(item.date, item.weekday);

    newsContainer.append(clone);
  }
};

const init = () => {
  displayAllNews();
};

init();
