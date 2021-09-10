
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

<script src="{{asset('public/js/scripts.js')}}"></script>
<script>



    cars =  {!! ($cars) !!};


    console.log(cars)

    const app = new Vue({
        el: '#app',
        data: {
            cars: cars,
            car: this.cars[0],
            selectedCar: 0,
            phoneVisible: false,
        },
        methods:{
            selectCar: function (index) {
               this.car = this.cars[index]
                this.selectedCar = index
                console.log('click');
            }
        },
        computed: {
            phoneBtnText() {
                return this.phoneVisible ? 'Hide phone' : 'Show phone'
            },
            bookLink(){
                var self = this;
                return 'http://testapp/pickpoint/car/' + self.car.id
            }
        }
    });


</script>

