<style scoped>
     .slug-widget{
         display: flex;
         justify-content: flex-start;
         align-items: center;
     }
     .wrapper{
         margin-left: 8px;
     }
     .slug{
         background-color: gold;
         padding: 3px 5px;
     }
 </style>

 <template>
     <div class="slug-widget">
         <div class="icon-wrapper wrapper">
             <i class="fa fa-link"></i>
         </div>
         <div class="url-wrapper wrapper">
             <span class="root-url"> {{ url }}</span>
             <span class="subdirectory-url">/{{subdirectory }}/</span>
             <span class="slug" v-show="Slug">{{Slug}}</span>
         </div>

     </div>

 </template>

 <script>
     export default {
         props: {
             url: {
               type: String,
               required: true
             },
             subdirectory:{
                 type: String,
                 required: true
             },
             title:{
                 type: String,
                 required: true
             }

         },
         data: function() {
             return{
                 slug: this.title
             }
         },
         computed: {
            // a computed getter
            Slug: function () {
            // `this` points to the vm instance

            return this.title.split(' ').join('-')
            }
        },
     }
 </script>

