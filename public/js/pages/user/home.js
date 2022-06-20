/* eslint-disable no-restricted-syntax */
console.log('home');

let currentNews = [];

const newsContainer = document.getElementById('news-list');

const clearNewsList = () => {
  newsContainer.innerHTML = '';
};

const getHistories = async () => {
  let response = await fetch('http://127.0.0.1:8000/api/history');
  response = await response.text();
  const newsIds = JSON.parse(response);
  return newsIds;
};

const getRecommendation = async (newsIds) => {
  const headers = new Headers();
  headers.append('Content-Type', 'application/json');
  const raw = JSON.stringify(newsIds);
  const requestOptions = {
    method: 'POST',
    headers,
    body: raw,
    redirect: 'follow',
  };
  let response = await fetch('http://127.0.0.1:5000/get_recommendation', requestOptions);
  response = await response.text();
  let news = JSON.parse(response);
  news = news.news;
  return news;
};

const getAllNews = async () => {
  let response = await fetch('http://127.0.0.1:5000/get_all_news');
  response = await response.text();
  let news = JSON.parse(response);
  news = news.news;
  return news;
};

const getNewsDetailByNewsIds = async (newsIds) => {
  const headers = new Headers();
  headers.append('Content-Type', 'application/json');
  const raw = JSON.stringify(newsIds);
  const requestOptions = {
    method: 'POST',
    headers,
    body: raw,
    redirect: 'follow',
  };
  let response = await fetch('http://127.0.0.1:5000/get_arr_news_detail', requestOptions);
  response = await response.text();
  const news = JSON.parse(response);
  return news.news;
};

const renderNews = () => {
  clearNewsList();
  for (item of currentNews) {
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

const renderFilteredNews = (e) => {
  const keyword = e.target.value;
  const filteredNews = currentNews.filter(
    (news) => news.title.toLowerCase().includes(keyword.toLowerCase()),
  );
  clearNewsList();
  for (item of filteredNews) {
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

// eslint-disable-next-line no-unused-vars
const onCategoryClickListener = async (selectedCategory) => {
  let response = await fetch(`http://127.0.0.1:5000/get_news_by_category?category=${selectedCategory}`);
  response = await response.text();
  let news = JSON.parse(response);
  news = news.news;

  currentNews = news;
  renderNews();

  const categoryMenuElement = document.getElementsByClassName('category-menu');
  // eslint-disable-next-line no-restricted-syntax
  for (const menuElement of categoryMenuElement) {
    if (menuElement.getAttribute('data-category') !== selectedCategory) {
      menuElement.classList.remove('selected');
    }
    else {
      menuElement.classList.add('selected');
    }
  }
};

const init = async () => {
  let histories = await getHistories();
  histories = histories.map((news) => news.news_id);
  console.log(histories);
  if (histories.length === 0) { // jika user tidak mempunyai history
    const news = await getAllNews();
    currentNews = news;
    renderNews();
  }
  else {
    const news_id_recommendation = await getRecommendation(histories);
    const news = await getNewsDetailByNewsIds(news_id_recommendation);
    currentNews = news;
    renderNews();
  }
  document.getElementById('inputSearchNews').addEventListener('input', renderFilteredNews);
  console.log(currentNews);
};

init();
