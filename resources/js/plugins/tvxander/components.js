import CastList from '@/Tvxander/CastList';
import SubtitleTab from '@/Tvxander/SubtitleTab';
import SourceBreadcumb from "@/Tvxander/SourceBreadcumb";
import BtnShare from "@/Tvxander/BtnShare";
import TvxanderVideoModal from "@/Tvxander/TvxanderVideoModal";
import CoolLightBox from "vue-cool-lightbox";
import "vue-cool-lightbox/dist/vue-cool-lightbox.min.css";

export default {
    install (Vue) {

        Vue.component('CastList', CastList);
        Vue.component('SubtitleTab', SubtitleTab);
        Vue.component('SourceBreadcumb', SourceBreadcumb);
        Vue.component('BtnShare', BtnShare);
        Vue.component('TvxanderVideoModal', TvxanderVideoModal);
        Vue.component('CoolLightBox', CoolLightBox);
        
        //Vue.component('tabs', Tabs);
    }
}

export { CastList, SubtitleTab, SourceBreadcumb };