VIEW.Search = (function () {
    var searchInput;
    var searchButton;
    var searchContent;

    var searchItems = [];

    var actions = {
        getSearch: function () {
            if(searchInput.value === ''){
                return;
            }

            axios.get('/zoeken/' + searchInput.value).then(function (response) {
                searchItems = [];

                for(let searchIndex = 0; searchIndex < response.data.length; searchIndex++){

                    var title;
                    var body;
                    var type;

                    if(response.data[searchIndex].title !== undefined){
                        title = response.data[searchIndex].title;
                    }else if(response.data[searchIndex].name !== undefined){
                        title = response.data[searchIndex].name;
                    }

                    if(response.data[searchIndex].body !== undefined){
                        body = response.data[searchIndex].body;
                    }else{
                        body = response.data[searchIndex].description;
                    }

                    body = body.replace(/<\/?[^>]+(>|$)/g, "");

                    if(body.length > 100){
                        body = body.substring(0,100) + " ...";
                    }

                    if(response.data[searchIndex].category_id !== undefined){
                        type = 'artikels';
                    }else if(response.data[searchIndex].address !== undefined){
                        type = 'bezienswaardigheden';
                    }else if(response.data[searchIndex].school_id !== undefined){
                        type = 'richting';
                    }else{
                        type = 'scholen';
                    }

                    var searchItem = {
                        id: response.data[searchIndex].id,
                        title: title,
                        body: body,
                        type: type,
                        school: response.data[searchIndex].school_id
                    };

                    searchItems.push(searchItem);
                }

                render();
            });
        }
    };

    var makeSearchContentItem = function(searchItem){
        var searchContentItem = document.createElement('a');
        searchContentItem.className = "search-content-item nodecoration";
        if(searchItem.type === 'richting'){
            searchContentItem.href = "/scholen/" + searchItem.school;
        }else{
            searchContentItem.href = "/" + searchItem.type + "/" + searchItem.id;
        }
        
        var searchCategory = document.createElement('div');
        searchCategory.className = 'search-category search-' + searchItem.type;
        searchCategory.innerHTML = searchItem.type;
        searchContentItem.appendChild(searchCategory);
        
        var searchTitle = document.createElement('h5');
        searchTitle.innerHTML = searchItem.title;
        searchContentItem.appendChild(searchTitle);

        var searchBody = document.createElement('span');
        searchBody.innerHTML = searchItem.body;
        searchContentItem.appendChild(searchBody);

        return searchContentItem;
    };

    var render = function () {
        searchContent.innerHTML = '';
        for(let searchIndex = 0; searchIndex < searchItems.length; searchIndex++){
            var contentItem = makeSearchContentItem(searchItems[searchIndex]);
            searchContent.appendChild(contentItem);
        }
    };

    var keySearch = function(event){
        actions.getSearch();
    };

    var events = function () {
        searchInput.addEventListener('keyup', keySearch, false);
        searchButton.addEventListener('click', actions.getSearch, false);
    };

    return {
        init: function () {
            searchButton = document.getElementById('menu-search-button');

            if (searchButton === null || searchButton === undefined) {
                return;
            }

            searchInput = document.getElementById('search-input');
            searchButton = document.getElementById('search-button');
            searchContent = document.getElementById('search-content');

            events();
        }
    };
})();