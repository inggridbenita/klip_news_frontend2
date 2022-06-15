const firstBreadcrumbLink = document.getElementById('first-breadcrumb-link');

const getNewsDetail = async (newsId) => {
  let response = await fetch(`http://127.0.0.1:5000/get_news_detail?id=${newsId}`);
  response = await response.text();
  const news = JSON.parse(response);

  let { content } = news;
  content = content.replaceAll('\n', '<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

  document.getElementById('newsHeader').setAttribute('src', news.poster);
  document.getElementById('title').innerHTML = news.title;
  document.getElementById('date').innerHTML = parseDateFromBackEnd(news.date, news.weekday);
  document.getElementById('newsContent').innerHTML = content;
};

const init = () => {
  const news_id = getURLParameter('id');
  const from = getURLParameter('from');
  if (from === 'history') {
    firstBreadcrumbLink.innerHTML = 'History';
    firstBreadcrumbLink.setAttribute('href', '/history');
  }
  getNewsDetail(news_id);
};

init();
