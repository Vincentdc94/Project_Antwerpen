VIEW.Article = (function (Validator) {

  /**
   * Form elements
   */
  var articleTitle;
  var articleText;
  var articleAuthor;
  var articleCategory;

  var actions = {
    addArticle: function () {
      axios.post('/admin/artikels', {
        "article": {
          "title": articleTitle.value,
          "text": CKEDITOR.instances["article-text"].getData(),
          "author": articleAuthor.value,
          "category": articleCategory.value,
          "media": UI.Media.mediaData
        }
      });
    },
    editArticle: function () {
      //TODO: Edit article met ajax
    }
  };

  var isValid = function () {
    return Validator.make({
      "titel": {
        "value": articleTitle.value,
        "element": articleTitle,
        "id": "article-title",
        "validate": ["empty"]
      },
      "tekst": {
        "value": articleText.value,
        "element": articleText,
        "id": "article-text",
        "validate": ["empty"]
      }
    });
  };

  var validateCreate = function(event){
    event.preventDefault();

    if(isValid()){
      articleCreateForm.submit();
    }
  };

  var validateEdit = function(event){
    event.preventDefault();

    if(isValid()){
      articleEditForm.submit();
    }
  };

  var events = function () {
    if(articleEditForm !== null){
      articleEditForm.addEventListener('submit', validateEdit, false);
    }
    
    if(articleCreateForm !== null){
      articleCreateForm.addEventListener('submit', validateCreate, false);
    }
  };

  return {
    save: actions.addArticle,
    init: function () {
      articleTitle = document.getElementById('article-title');

      if (articleTitle === null) {
        return;
      }
      
      articleText = document.getElementById('article-text');
      articleAuthor = document.getElementById('article-author');

      articleCategory = document.getElementById('article-category');

      articleEditForm = document.getElementById('article-edit-form');
      articleCreateForm = document.getElementById('article-create-form');

      events();
    }
  };
})(VALIDATOR.Validator);