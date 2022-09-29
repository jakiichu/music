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
        trackProps: '',
        tracks: [],
        
    },
    methods: {
        say: function (message) {
            this.message = message
        },
        search: function (asd) {

            asd = asd.replace(/ /g, "+");
            window.location.href = '/song/view?id=' + asd;

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
            
        }
    },
        mounted: async function() {
            const t = this
            await fetch('http://localhost:8080/api/index', {
                method: 'GET',
            }).then(async response => {
                t.tracks = await response.json()
            })
        }
})


