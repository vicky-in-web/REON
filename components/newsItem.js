export default {
    template: `
    <div class="col-sm-3 news-item">
        <a :href="href" style="display: block; text-decoration: none;">
            <div>
                <img :src="src" class="news-item-img">
            </div>
            <div class="news-item-body" v-html="content">
            </div>
        </a>
    </div>
    `,
    props:{
        href:String,
        src:String,
        content:String
    }
}



