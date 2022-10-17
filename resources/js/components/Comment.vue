<template>
 <div class="">
   <h5>コメント</h5>
   <input type="text" v-model="text" class="px-2 py-2" placeholder="Type a Comment" />
   <!-- テキスト入力した場合 -->
   <button v-show="text != ''" @click.prevent="send()" type="button" class="btn btn-sm btn-primary">送信する</button>
   <p></p>
   <h5 class="mb-3">コメント一覧</h5>
   <div class="container">
     <!-- 複数コメントループ -->
     <div v-for="comment in comments" :key="comment.id">
       <div class="row my-2">
         <small class="text-muted mr-4">{{comment.user.name}}</small>
         <!-- 編集 -->
         <div v-if="edit_time && comment.id == edit_comment.id">
           <!-- edit_time = true -->
           <input type="text" v-model="edit_comment.text" class="px-2 py-2" placeholder="Type a Comment" />
           <button v-if="edit_comment.text != ''" @click.prevent="update(edit_comment)" type="button" class=" btn btn-primary btn-sm">更新</button>
           <button  @click.prevent="back(comment)" type="button" class="btn btn-outline-dark btn-sm ml-1">戻る</button>
         </div>
         <!-- 閲覧 -->
         <div v-else>
           <p style="display: contents;">{{comment.text}}</p>
           <!-- コメントユーザとログインユーザが一致 -->
           <button v-if="comment.user_id == login_user_id" @click.prevent="edit(comment)" type="button" class="ml-4 btn btn-warning btn-sm">編集</button>
           <!-- or 投稿ユーザとログインユーザが一致 -->
           <button v-if="comment.user_id == login_user_id || post.user_id == login_user_id" @click.prevent="destroy(comment.id)" type="button" class="ml-1 btn btn-danger btn-sm">削除</button>
         </div>
       </div>
     </div>
   </div>
 </div>
</template>

<script>
export default {
 props: ['post', 'login_user_id'],
 data() {
   return {
     text: '',
     edit_time: false,
     edit_comment: {},
     comments: [],
   }
 },
 // ポーリング
  // mounted () {
  //   setInterval(() => {
  //     this.getComments();
  //   }, 3000)
  // },
  created() {
   this.getComments()
 },
 methods: {
  // 投稿
   send() {
     const id = {
       post_id: this.post.id
     }
     const text = {
       comment: this.text
     }
     const path = "/posts/" + this.post.id + "/comments";
     this.text = ''
     axios.post(path, text).then(res => {
         this.getComments();
    //   this.$store.dispatch('comment/get_comments', id)
     }).catch(function(err) {
      console.log(err)
     })
   },
   // 取得
   getComments() {
     const path = "/posts/" + this.post.id + "/get_comments";
     axios.get(path).then(res => {
       this.comments = res.data;
     }).catch(function(err) {
       console.log(err)
     })
   },
   // 編集
   edit(comment) {
     this.edit_time = true
     this.edit_comment = comment
     this.edit_comment.old_text = comment.text
   },
   // 更新
   update(comment) {
     const update_comment = {
       text: comment.text
     }
     const path =  "/posts/" + this.post.id + "/comments/" + comment.id;
     axios.put(path, update_comment).then(res => {
       this.edit_time = false
       this.edit_comment = {}
       this.getComments()
     }).catch(function(err) {
       console.log(err)
     })
   },
   // 削除
   destroy(comment_id) {
     const path = "/posts/" + this.post.id + "/comments/" + comment_id;
     axios.delete(path).then(res => {
       this.getComments()
     }).catch(function(err) {
       console.log(err)
     })
   },
   // 戻るボタン
   back(comment) {
     console.log(comment);
     comment.text = comment.old_text
     this.edit_time = false
     this.edit_comment = {}
   }
 }
}
</script>