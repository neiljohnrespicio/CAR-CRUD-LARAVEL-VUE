<template>
    <div>
        <div class="c1">
            <!-- nested axios -->
            <Add @submitted="getter" v-if="!is_edit"/>

            
            <Edit @submitted="getter" :item="item" @cancelEdit="cancelEdit" v-else/>
        </div>
        <div class="c2">
            <View :items="items" @successful="getter" @edit="editName" @sell="getter"/>
            <Sell :item_sell="item_sell"/>
            <Sold :item_sold="item_sold"/>
            
        </div>
            
        
    </div>
</template>
<script>

import Add from './Add.vue';
import Edit from'./Edit.vue';
import View from './View.vue'
import Sell from './Sell.vue';
import Sold from './Sold.vue';

export default {
    components:{
        Add,
        View,
        Edit,
        Sell,
        Sold
    },
    data() {
        return {
            items:[],
            item_sell:[],
            item_sold:[],
            is_edit: false,
            item:[],

        };
    },
    mounted(){
        this.getter();
        this.getter1();
        this.getter2();
    },
    watch:{
        item_sold(New, Old){
            this.getter2()
        },
        item_sell(New, Old){
            this.getter1()
        }
        
        
        
        

    },
    methods: {
        getter(){
            axios.get("/get-names").then(({data})=>{this.items = data;});
            //------edit
            this.cancelEdit();
        },
        getter1(){
            axios.get("/sell-items").then(({data})=>{
                this.item_sell = data;
            });          
``
        },
        getter2(){
            axios.get("/sold-items").then(({data})=>{this.item_sold = data;});
            
``
        },

        //------EDIT
        editName(item){
            this.is_edit = true;
            this.item = item;
        },
        cancelEdit(){
            this.is_edit = false;
            this.item =[];  
        },
       

    },

}
</script>
<style>
    .c1{
        margin-top: 10px;

        
    }
    .c2{
        margin-top: 5%;
    }

    
    
</style>