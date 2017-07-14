const TfmModel = {

    getDocumentsByDate(callback){
        $.getJSON("DocumentsByDate", callback);
    },

    getDocumentsByCategory(callback){
        $.getJSON("DocumentsByCategory", callback);
    },

    getCategoryDocumentsByDate(category,callback){
        $.getJSON("/Category/DocumentsByDate/"+category, callback);
    },

    getDocumentsByLocation(callback){
        $.getJSON("DocumentsByLocation", callback);
    },

    getCategoryDocumentsByLocation(category,callback){
        $.getJSON("/Category/DocumentsByLocation/"+category, callback);
    }
};

export default TfmModel;
