function isConsecutive(array) {
    if (array.length===0){
        return false;
    }
    for (let i = 1; i < array.length; i++) {
        if (array[i] !== array[i - 1] + 1) {
            return false;
        }
    }
    return true;
}