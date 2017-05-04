FORM.Article = (function(){

  /**
  * Form elements
  */
  var articleTitle;
  var articleText;
  var articleCategory;

  var save = function(title, text){

    console.log(articleText.innerHTML);

    axios.post('/admin/artikels', {"article": {
      "title": articleTitle.value,
      "text": articleText.value,
      "category": articleCategory.value,
      "media": UI.Media.mediaData
    }});
  };

  var defineInputs = function(){
    articleTitle = document.getElementById('article-title');
    articleText = document.getElementById('article-text');

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
