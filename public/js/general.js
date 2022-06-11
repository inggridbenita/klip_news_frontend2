/* eslint-disable no-unused-vars */
/* eslint-disable no-param-reassign */
console.log('general.js');

function getMeta(metaName) {
  const metas = document.getElementsByTagName('meta');
  for (let i = 0; i < metas.length; i++) {
    if (metas[i].getAttribute('name') === metaName) {
      return metas[i].getAttribute('content');
    }
  }

  return '';
}

function convertToRupiah(angka)
{
  let rupiah = '';
  const angkarev = angka.toString().split('').reverse().join('');
  for (let i = 0; i < angkarev.length; i++) if (i % 3 == 0) rupiah += `${angkarev.substr(i, 3)}.`;
  return `Rp. '${rupiah.split('', rupiah.length - 1).reverse().join('')}`;
}

function convertMonthIntToStringBahasa(intMonth) {
  stringMonth = '';
  switch (intMonth) {
    case 1:
      stringMonth = 'Januari';
      break;
    case 2:
      stringMonth = 'Februari';
      break;
    case 3:
      stringMonth = 'Maret';
      break;
    case 4:
      stringMonth = 'April';
      break;
    case 5:
      stringMonth = 'Mei';
      break;
    case 6:
      stringMonth = 'Juni';
      break;
    case 7:
      stringMonth = 'Juli';
      break;
    case 8:
      stringMonth = 'Agustus';
      break;
    case 9:
      stringMonth = 'September';
      break;
    case 10:
      stringMonth = 'Okober';
      break;
    case 11:
      stringMonth = 'November';
      break;
    case 12:
      stringMonth = 'Desember';
      break;
    default:
      break;
  }
  return stringMonth;
}

function convertWeekdayEnglishToBahasa(weekday) {
  stringWeekday = '';
  switch (weekday) {
    case 'Monday':
      stringWeekday = 'Senin';
      break;
    case 'Tuesday':
      stringWeekday = 'Selasa';
      break;
    case 'Wednesday':
      stringWeekday = 'Rabu';
      break;
    case 'Thursday':
      stringWeekday = 'Kamis';
      break;
    case 'Friday':
      stringWeekday = "Jum'at";
      break;
    case 'Saturday':
      stringWeekday = 'Sabtu';
      break;
    case 'Sunday':
      stringWeekday = 'Minggu';
      break;
    default:
      break;
  }
  return stringWeekday;
}

function getURLParameter(parameter) {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  return urlParams.get(parameter);
}

function convertDiseaseToOrder(disease) {
  let order = 0;
  switch (disease) {
    case 'Tipes':
      order = 1;
      break;
    case 'Covid':
      order = 2;
      break;
    case 'Diare':
      order = 3;
      break;
    case 'Usus Buntu':
      order = 4;
      break;
    case 'Diabetes':
      order = 5;
      break;
    case 'TBC':
      order = 6;
      break;
    case 'Hipertensi':
      order = 7;
      break;
    case 'Demam Berdarah':
      order = 8;
      break;
    default:
      order = 0;
  }
  return order;
}

function sleep(ms) {
  // eslint-disable-next-line no-promise-executor-return
  return new Promise((resolve) => setTimeout(resolve, ms));
}

function convertCategoryToReadable(category) {
  return category == 'gaya_hidup' ? 'Gaya Hidup' : 'Hiburan';
}

function parseDateFromBackEnd(date, weekday) {
  date = Date.parse(date);
  date = new Date(date);
  const newDate = date.getDate();
  const month = date.getMonth();
  const year = date.getUTCFullYear();
  let hours = date.getHours();
  let minutes = date.getMinutes();
  weekday = convertWeekdayEnglishToBahasa(weekday);
  if (hours < 10) {
    hours = `0${hours}`;
  }
  if (minutes < 10) {
    minutes = `0${minutes}`;
  }
  return `${weekday}, ${newDate} ${convertMonthIntToStringBahasa(month)} ${year} ${hours}:${minutes}`;
}
