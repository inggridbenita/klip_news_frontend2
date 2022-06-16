console.log('home');

const newsContainer = document.getElementById('news-list');

const clearNewsList = () => {
  newsContainer.innerHTML = '';
};

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

// eslint-disable-next-line no-unused-vars
const onCategoryClickListener = async (selectedCategory) => {
  let response = await fetch(`http://127.0.0.1:5000/get_news_by_category?category=${selectedCategory}`);
  response = await response.text();
  let news = JSON.parse(response);
  news = news.news;

  clearNewsList();
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
  // const categoryMenuElement = document.getElementsByClassName('category-menu');
  // // eslint-disable-next-line no-restricted-syntax
  // for (const menuElement of categoryMenuElement) {
  //   menuElement.addEventListener('click', () => {
  //     await onCategoryClickListener();
  //   });
  // }

  // displayAllNews();
};

init();
