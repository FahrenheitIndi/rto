<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import DashboardLayout from '@/Backend/Layouts/DashboardLayout.vue';

import { useEditor, EditorContent } from '@tiptap/vue-3';
import Image from '@tiptap/extension-image';
import StarterKit from '@tiptap/starter-kit';

const props = defineProps({
    post: Object
});

const editor = useEditor({
    content: props.post.content,
    extensions: [
        StarterKit,
        Image,
    ],
});

const form = useForm({
    _method: 'PUT',
    id: props.post.id,
    title: props.post.title,
    content: props.post.content
})

const updatePost = () => {
    form.post(route('posts.edit'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        // onSuccess: () => clearPhotoFileInput(),
    });
};
</script>
<template>
    <DashboardLayout :title="form.title">
        <h1 class="mb-8 text-3xl font-bold">
            <Link class="text-indigo-400 hover:text-indigo-600" :href="route('posts.index')" >All Posts</Link>
            <span class="text-indigo-400 font-medium">/</span>
            {{ form.title }}
        </h1>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-if="editor">
                        <button @click="editor.chain().focus().toggleBold().run()" :class="{ 'is-active': editor.isActive('bold') }">
                            bold
                        </button>
                    </div>
                    <EditorContent :editor="editor" />
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>
<style>
/* Basic editor styles */
.ProseMirror > * + * {
    margin-top: 0.75em;
}
.ProseMirror ul, ol {
    padding: 0 1rem;
}
.ProseMirror
h1,
h2,
h3,
h4,
h5,
h6 {
    line-height: 1.1;
}
/*.ProseMirror code {*/
/*    background-color: rgba(#616161, 0.1);*/
/*    color: #616161;*/
/*}*/
/*.ProseMirror */
/*.ProseMirror {*/


/*    */

/*    */

/*    */

/*    pre {*/
/*        background: #0D0D0D;*/
/*        color: #FFF;*/
/*        font-family: 'JetBrainsMono', monospace;*/
/*        padding: 0.75rem 1rem;*/
/*        border-radius: 0.5rem;*/

/*        code {*/
/*            color: inherit;*/
/*            padding: 0;*/
/*            background: none;*/
/*            font-size: 0.8rem;*/
/*        }*/
/*    }*/

/*    img {*/
/*        max-width: 100%;*/
/*        height: auto;*/
/*    }*/

/*    blockquote {*/
/*        padding-left: 1rem;*/
/*        border-left: 2px solid rgba(#0D0D0D, 0.1);*/
/*    }*/

/*    hr {*/
/*        border: none;*/
/*        border-top: 2px solid rgba(#0D0D0D, 0.1);*/
/*        margin: 2rem 0;*/
/*    }*/
/*}*/
</style>
