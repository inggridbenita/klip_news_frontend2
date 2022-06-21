console.log('aside');

const page_name = getMeta('page');

if (page_name != 'read') {
  const menuLabel = document.getElementById(`${page_name}-aside-menu-label`);
  menuLabel.style.fontWeight = 'bold';
}
