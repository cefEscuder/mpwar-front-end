const TfmModel = {

    getDocumentsByDate(callback){
        $.getJSON("DocumentsByDate", callback);
    },

    getDocumentsByCategory(callback){
        $.getJSON("DocumentsByCategory", callback);
    },

    getCategoryDocumentsByDate(category,callback){
        $.getJSON("/Category/DocumentsByDate/"+category, callback);
    }
};

export default TfmModel;
