function jumpPage() {
  if (event.keyCode==37) location=preview_page;
  if (event.keyCode==39) location=next_page;
  if (event.keyCode==13) location=index_page;
}
document.onkeydown=jumpPage;