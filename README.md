# 🎨 Xiaoxu 主题

> 基于 Vue3 + Vite + Laravel 的现代化图床主题，采用前后端分离架构

[![Build Status](https://github.com/your-username/xiaoxu-theme/workflows/🚀%20自动部署%20Xiaoxu%20主题/badge.svg)](https://github.com/your-username/xiaoxu-theme/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Vue 3](https://img.shields.io/badge/Vue-3-4FC08D?logo=vue.js&logoColor=white)](https://vuejs.org/)
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)

## 📋 项目简介

Xiaoxu 主题是一个专为兰空图床开发的现代化主题，采用 Vue3 + Laravel 混合部署架构，提供优秀的用户体验和强大的功能。

### ✨ 主要特性

- 🎯 **前后端分离**: Vue3 SPA + Laravel API
- 🚀 **现代技术栈**: Vue3 + Vite + TypeScript + Tailwind CSS
- 📱 **响应式设计**: 完美适配桌面和移动设备
- 🎨 **美观界面**: 采用 NativeUI 组件库
- 🔄 **自动部署**: GitHub Actions 自动化工作流
- ⚡ **高性能**: Vite 构建，资源优化

## 📁 项目结构

```
Xiaoxu/
├── assets/                    # 静态打包资源
│   ├── *.js                  # JavaScript 文件
│   ├── *.css                 # 样式文件
│   ├── *.gz                  # Gzip 压缩文件
│   └── images/               # 图片资源
├── views/                    # 视图文件
│   └── index.blade.php       # 主页面模板
└── XiaoxuTheme.php          # 主题类文件
```

## 🚀 快速开始

### 环境要求

- Node.js >= 16.0.0
- npm >= 8.0.0
- PHP >= 8.0
- Laravel >= 9.0

### 安装步骤

1. **克隆仓库**
   ```bash
   git clone https://github.com/your-username/xiaoxu-theme.git
   cd xiaoxu-theme
   ```

2. **安装依赖**
   ```bash
   cd web
   npm install
   ```

3. **开发模式**
   ```bash
   npm run dev
   ```

4. **构建生产版本**
   ```bash
   npm run build
   ```

## 📦 自动部署

### 方式一：本地脚本部署

```bash
# 运行自动部署脚本
./deploy.sh
```

脚本会自动：
- 🔨 构建 Vue 项目
- 📁 复制资源到 Xiaoxu 目录
- 💾 提交到 Git
- ⬆️ 推送到 GitHub

### 方式二：GitHub Actions 自动部署

推送代码到 `main` 或 `master` 分支时，GitHub Actions 会自动：
- 🔄 检测源码变更
- 🏗️ 构建项目
- 📤 自动提交构建结果

## ⚙️ 配置说明

### Git 远程仓库设置

首次使用需要设置 GitHub 远程仓库：

```bash
git remote add origin https://github.com/your-username/xiaoxu-theme.git
git branch -M main
git push -u origin main
```

### GitHub Actions 权限

确保 GitHub 仓库开启以下权限：
- Settings → Actions → General → Workflow permissions → Read and write permissions

## 🛠️ 开发指南

### 目录说明

- `web/src/` - Vue.js 源码
- `web/public/` - 静态资源
- `web/Xiaoxu/` - 构建输出目录
- `.github/workflows/` - GitHub Actions 配置

### 构建配置

项目使用 Vite 进行构建，配置文件位于 `web/vite.config.ts`：

```typescript
export default defineConfig({
  build: {
    outDir: './Xiaoxu',
    // 其他构建配置...
  }
})
```

### 样式定制

- 主要样式使用 Tailwind CSS
- 自定义样式位于 `web/src/assets/`
- 支持主题管理员面板自定义 CSS

## 🔧 故障排除

### 常见问题

**Q: 构建失败怎么办？**
```bash
cd web
npm install  # 重新安装依赖
npm run build # 重新构建
```

**Q: 推送失败？**
```bash
git remote -v  # 检查远程仓库
git push -f origin main  # 强制推送（谨慎使用）
```

**Q: Assets 目录为空？**
- 检查 `web/vite.config.ts` 中的 `outDir` 配置
- 确保构建过程没有错误

## 📈 性能优化

- ✅ 代码分割和懒加载
- ✅ Gzip 压缩
- ✅ 图片优化
- ✅ CSS 和 JS 压缩
- ✅ CDN 支持

## 🤝 贡献指南

1. Fork 此仓库
2. 创建功能分支 (`git checkout -b feature/AmazingFeature`)
3. 提交更改 (`git commit -m 'Add some AmazingFeature'`)
4. 推送到分支 (`git push origin feature/AmazingFeature`)
5. 创建 Pull Request

## 📄 许可证

本项目采用 MIT 许可证 - 查看 [LICENSE](LICENSE) 文件了解详情

## 🙏 致谢

- [Vue.js](https://vuejs.org/) - 渐进式 JavaScript 框架
- [Laravel](https://laravel.com/) - PHP Web 应用框架
- [Vite](https://vitejs.dev/) - 下一代前端构建工具
- [Tailwind CSS](https://tailwindcss.com/) - 实用优先的 CSS 框架

## 📞 支持

如遇问题，请：
- 📝 [提交 Issue](https://github.com/your-username/xiaoxu-theme/issues)
- 💬 参与 [Discussions](https://github.com/your-username/xiaoxu-theme/discussions)

---

⭐ 如果这个项目对您有帮助，请给一个星标支持！
