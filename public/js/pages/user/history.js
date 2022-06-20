console.log('history');

const newsContainer = document.getElementById('news-list');
const emptyHistoryAlert = document.getElementById('empty-history-alert');

const getHistories = async () => {
  let response = await fetch('http://127.0.0.1:8000/api/history');
  response = await response.text();
  const newsIds = JSON.parse(response);
  return newsIds;
};

const displayNewsByNewsIds = async (newsIds) => {
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
  let news = JSON.parse(response);
  news = news.news;
  // eslint-disable-next-line no-restricted-syntax
  for (item of news) {
    const template = document.getElementById('newsTemplate');

    const category = convertCategoryToReadable(item.category);

    const clone = template.content.cloneNode(true);
    clone.querySelector('a').setAttribute('href', `/baca?id=${item.id}&from=history`);
    clone.querySelector('img').setAttribute('src', item.poster);
    clone.querySelector('p').innerHTML = item.title;
    clone.querySelector('.category').innerHTML = category;
    clone.querySelector('.time').innerHTML = parseDateFromBackEnd(item.date, item.weekday);

    newsContainer.append(clone);
  }

  if (news.length === 0) {
    emptyHistoryAlert.style.display = 'flex';
  }
};

const init = async () => {
  let newsIds = await getHistories();
  newsIds = newsIds.map((id) => id.news_id);
  await displayNewsByNewsIds(newsIds);
};

init();
