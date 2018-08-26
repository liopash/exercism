//https://en.wikipedia.org/wiki/Doubly_linked_list
class LinkedList {
    constructor() {
        this.listHead = null;
        this.listTail = null;
        this.numberOfValues = 0;
    }

    unshift(data) {
        let node = { data: data, next: null, prev: null };

        function getPrev(node, prev) {
            if (prev.prev === null) {
                node.next = prev;
                prev.prev = node;
            } else {
                getPrev(node, prev.prev);
            }
        }

        if (this.numberOfValues === 0) {
            this.listHead = node;
            this.listTail = node;
            this.numberOfValues++;
            return this;
        } else {
            getPrev(node, this.listTail);
            this.listHead = node;
            this.numberOfValues++;
            return this;
        }
    }

    shift() {
	  let shift = this.listHead.data;
        if (this.numberOfValues <= 1) {
            this.listHead = null;
            this.listTail = null;
            this.numberOfValues = 0;
        } else {
            this.listHead.next.prev = null;
            this.listHead = this.listHead.next;
            this.numberOfValues--;
        }
        return shift;
    }

    push(data) {
        let node = { data: data, next: null, prev: null };

        function getNext(node, next) {
            if (next.next === null) {
                node.prev = next;
                next.next = node;
            } else {
                getNext(node, next.next);
            }
        }

        if (this.numberOfValues === 0) {
            this.listHead = node;
            this.listTail = node;
            this.numberOfValues++;
            return this;
        } else {
            getNext(node, this.listHead);
            this.listTail = node;
            this.numberOfValues++;
            return this;
        }
    }

    pop() {
	  let pop = this.listTail.data;
        if (this.numberOfValues <= 1) {
            this.listHead = null;
            this.listTail = null;
            this.numberOfValues = 0;
        } else {
            this.listTail.prev.next = null;
            this.listTail = this.listTail.prev;
            this.numberOfValues--;
        }
        return pop;
    }

    count() {
        return this.numberOfValues;
    }

    headData() {
        let arr = [];
        function getData(x, arr) {
            if (x.next === null) {
                arr.push(x.data);
            } else {
                arr.push(x.data);
                getData(x.next, arr);
            }
        }
        getData(this.listHead, arr);
        return arr;
    }

    tailData() {
        let arr = [];
        function getData(x, arr) {
            if (x.prev === null) {
                arr.push(x.data);
            } else {
                arr.push(x.data);
                getData(x.prev, arr);
            }
        }
        getData(this.listTail, arr);
        return arr;
    }

    delete(data) {
	  
      if (this.numberOfValues <= 1) { 
        this.listHead = null;
        this.listTail = null;
        this.numberOfValues = 0;
        return this
      }
      
      function getDel(data, node) {
              if (node.data === data) {
                  node.prev.next = node.next;
                  node.next.prev = node.prev;
                  } else {
                  getDel(data, node.next);
              }
      }
      getDel(data,this.listHead);
      this.numberOfValues--;
      return this;
    }
    
}

module.exports = LinkedList;