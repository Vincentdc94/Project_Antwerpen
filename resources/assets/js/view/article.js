VIEW.Article = (function(){

  /**
  * Form elements
  */
  var articleTitle;
  var articleText;
  var articleAuthor;
  var articleCategory;

  var actions = {
    addArticle: function(){
      axios.post('/admin/artikels', {"article": {
        "title": articleTitle.value,
        "text": CKEDITOR.instances["article-text"].getData(),
        "author": articleAuthor.value,
        "category": articleCategory.value,
        "media": UI.Media.mediaData
      }});
    },
    editArticle: function(){
      //TODO: Edit article met ajax
    }
  };

  var events = function(){
    buttonSave.addEventListener('click', actions.addArticle, false);
  };

  return{
    save: actions.addArticle,
    init: function(){
      buttonSave = document.getElementById('article-save');

      if(buttonSave === null){
        return;
      }

      articleTitle = document.getElementById('article-title');
      articleText = document.getElementById('article-text');
      articleAuthor = document.getElementById('article-author');

      articleCategory = document.getElementById('article-category');

      events();
    }
  };
})();
