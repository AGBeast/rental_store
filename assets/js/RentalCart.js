const shoppingCart = (function(){
    let itemsList = [];
    let itemCount;
    let item = {}

    function addItem(item){
        itemsList.push(items);
    }

    function saveCartItems(){
        for(let i = 0; i < itemsList.length; i++){
            sessionStorage.setItem()
        }
    }

    function currentItemCount(){
        itemCount = itemsList.length;
        return itemCount;
    }

    function makeComment(){
        console.log('Made it!!');
    }

    return {

        addItem:addItem,
        saveCartItems:saveCartItems,
        makeComment:makeComment

    }
})();
