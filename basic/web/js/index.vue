var player = new Vue({
    el: ".track-view",
    data: {
        material: '',
        message: '',
        asd: '',
        seen: true,
        start: 'start',
        start1: 'start',
        pause: 'pause',
        pause1: 'pause',
        trackProps: ''
        
    },
    methods: {
        say: function (message) {
            this.message = message
        },
        search: function (asd) {

            asd = asd.replace(/ /g, "+");
            window.location.href = 'http://localhost:8080/song?SongSearch%5Bid%5D=&SongSearch%5Bname%5D=&SongSearch%5Bartist%5D=' + asd + '&SongSearch%5Btimeline%5D=&SongSearch%5Balbum%5D=';

        },
        seenHide: function(id){
            this.seen = !this.seen
            this.start1 = this.start + id
            document.getElementById(this.start1).setAttribute('style', 'display: none');
            if(document.getElementById(this.start1).hasAttribute('style')){
                this.asd = document.getElementById(this.start1).getAttribute('style');
                if(this.asd == 'display: none'){
                    this.pause1 = this.pause + id
                    document.getElementById(this.pause1).setAttribute('style', 'dispalay:block');
                }
            }
            
        },
        HideSeen: function(id){
            
            document.getElementById(this.pause1).setAttribute('style', 'display: none');
            if(document.getElementById(this.pause1).hasAttribute('style')){
                this.asd = document.getElementById(this.pause1).getAttribute('style');
                if(this.asd == 'display: none'){
                    this.start1 = this.start + id
                    document.getElementById(this.start1).setAttribute('style', 'dispalay:block');
                    document.body.getElementsByTagName("audio").style['-webkit-media-controls-play-button'].click();

                    
                }
            }
            
        },
    }
})
var player2 = new Vue({
    el: ".track",
    data: {
        cartname: document.getElementById("name1").innerHTML,
        material: '',
        message: '',
        seen: true,
        start: 'start',
        start1: 'start',
        pause: 'pause',
        pause1: 'pause',
        asd: ''
    },
    methods: {
        seenHide: function(id){
            this.seen = !this.seen
            this.start1 = this.start + id
            document.getElementById(this.start1).setAttribute('style', 'display: none');
            if(document.getElementById(this.start1).hasAttribute('style')){
                this.asd = document.getElementById(this.start1).getAttribute('style');
                if(this.asd == 'display: none'){
                    this.pause1 = this.pause + id
                    document.getElementById(this.pause1).setAttribute('style', 'dispalay:block');
                }
            }
            
        },
        HideSeen: function(id){
            
            document.getElementById(this.pause1).setAttribute('style', 'display: none');
            if(document.getElementById(this.pause1).hasAttribute('style')){
                this.asd = document.getElementById(this.pause1).getAttribute('style');
                if(this.asd == 'display: none'){
                    this.start1 = this.start + id
                    document.getElementById(this.start1).setAttribute('style', 'dispalay:block');
                    document.body.getElementsByTagName("audio").style['-webkit-media-controls-play-button'].click();

                    
                }
            }
            
        },
        say: function (message) {
            this.message = message
            <!-- console.log(this.message); -->
        },
        
        
    },
    mounted() {
        console.log(this.cartname)
   }
})

