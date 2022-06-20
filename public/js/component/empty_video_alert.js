/* eslint-disable no-unused-vars */
const emptyVideoAlert = document.getElementById('empty-video-alert');

const displayEmptyVideoAlert = (keyword) => {
  emptyVideoAlert.style.display = 'flex';
};

const hideEmptyVideoAlert = () => {
  emptyVideoAlert.style.display = 'none';
};
