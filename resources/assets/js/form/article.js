FORM.Article = (function(){

  /**
  * Form elements
  */
  var articleTitle;
  var articleText;
  var articleAuthor;
  var articleCategory;

  var save = function(){
    axios.post('/admin/artikels', {"article": {
      "title": articleTitle.value,
      "text": CKEDITOR.instances["article-text"].getData(),
      "author": articleAuthor.value,
      "category": articleCategory.value,
      "media": UI.Media.mediaData
    }});
  };

  var defineInputs = function(){
    articleTitle = document.getElementById('article-title');
    articleText = document.getElementById('article-text');
    articleAuthor = document.getElementById('article-author');

    articleCategory = document.getElementById('article-category');
  };

  var events = function(){
    buttonSave.addEventListener('click', save, false);
  };

  return{
    save: save,
    init: function(){
      buttonSave = document.getElementById('article-save');

      if(buttonSave === null){
        return;
      }

      defineInputs();
      events();
    }
  };
})();
