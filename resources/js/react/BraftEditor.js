import React from 'react'
// 引入编辑器组件
import BraftEditor from 'braft-editor'
// 引入编辑器样式
import 'braft-editor/dist/index.css'

export default class Editor extends React.Component {

    state = {
        // 创建一个空的editorState作为初始值
        editorState: BraftEditor.createEditorState(null),
        mediaAccepts: {
            image: 'image/png,image/jpeg,image/gif,image/webp,image/apng,image/svg',
            video: 'video/mp4',
            audio: 'audio/mp3',
        },
        mediaExternals: {
            image: true,
            video: true,
            audio: true,
            embed: true,
        },
        mediaPasteImage: true,
        mediaMaxSize: 1024 * 1024 * 10
    }

    async componentDidMount () {
        // 使用BraftEditor.createEditorState将html字符串转换为编辑器需要的editorStat
        this.setState({
            editorState: BraftEditor.createEditorState(this.props.content)
        })
    }

    handleUpload = (param) => {

        const serverURL = '/admin/tyrantg/braft/upload'
        const xhr = new XMLHttpRequest
        const fd = new FormData()

        const handleUploadSuccess = (response) => {
            const {result_code, return_code, msg, url} = JSON.parse(xhr.responseText)
            if (result_code === 'SUCCESS') {
                param.success({
                    url: url,
                    /*meta: {
                        id: 'xxx',
                        title: 'xxx',
                        alt: 'xxx',
                        loop: true, // 指定音视频是否循环播放
                        autoPlay: true, // 指定音视频是否自动播放
                        controls: true, // 指定音视频是否显示控制栏
                        poster: 'http://xxx/xx.png', // 指定视频播放器的封面
                    }*/
                })
                Dcat.success('文件上传成功');
            } else {
                Dcat.success(msg);
            }

        }

        const handleUploadProgress = (event) => {
            // 上传进度发生变化时调用param.progress
            param.progress(event.loaded / event.total * 100)
        }

        const handleUploadError = (response) => {
            // 上传发生错误时调用param.error
            param.error({
                msg: 'unable to upload.'
            })
        }

        xhr.upload.addEventListener("progress", handleUploadProgress, false)
        xhr.addEventListener("load", handleUploadSuccess, false)
        xhr.addEventListener("error", handleUploadError, false)
        xhr.addEventListener("abort", handleUploadError, false)

        fd.append('file', param.file)
        xhr.open('POST', serverURL, true)
        xhr.send(fd)
    }

    mediaValidate = (file) => {
        const { mediaMaxSize } = this.state
        const sizeResult = file.size > mediaMaxSize
        if (sizeResult) {
            Dcat.error('文件大小超过'+mediaMaxSize / (1024 * 1024)+'MB');
        }
        return ! sizeResult

    }

    handleEditorChange = (editorState) => {
        this.setState({ editorState })
    }

    render () {
        const { editorState, mediaAccepts, mediaExternals, mediaPasteImage } = this.state
        const { handleChange } = this.props
        return (
            <div>
                <BraftEditor
                    value={editorState}
                    onChange={handleChange}
                    media={{
                        uploadFn: this.handleUpload,
                        validateFn: this.mediaValidate,
                        accepts: mediaAccepts,
                        externals: mediaExternals,
                        pasteImage: mediaPasteImage,
                    }}
                />
            </div>
        )

    }

}
/*export default () => {
    return (
        <>
            <Editor />
        </>
    );
};*/
