<template>
    <be class="braft-editor" :content="content"  @handleChange="handleEditorChange"></be>
</template>

<script>
import BraftEditor from '../react/BraftEditor'

export default {
    name: 'BraftEditor',
    props: {
        name: {
            type: String,
            default: ''
        },
        value: {
            type: String,
            default: ''
        }
    },
    components: {
        'be': BraftEditor
    },
    data() {
        return {
            content: ''
        }
    },
    created() {
        this.content = this.value
    },
    methods: {
        handleEditorChange(e) {
            $(`.braft[name=${this.name}]`).val(e.toHTML())
        },
    }
}
</script>

<style scoped lang="scss">
.braft-editor {
    border: 1px solid #e0e0e8;
    border-radius: 4px;
}
</style>
