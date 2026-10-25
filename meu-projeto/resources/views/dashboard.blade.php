<x-app-layout>
    <div class="aqua-workspace" x-data="{ tab: ['peixes', 'categorias'].includes(location.hash.slice(1)) ? location.hash.slice(1) : 'catalogo' }" @hashchange.window="tab = ['peixes', 'categorias'].includes(location.hash.slice(1)) ? location.hash.slice(1) : 'catalogo'">
        <header class="aqua-welcome">
            <div>
                <span class="auth-kicker">SEU UNIVERSO AQUÁTICO</span>
                <h1>Um lugar para cada espécie.</h1>
                <p>Cuide dos detalhes. Dê vida ao seu catálogo.</p>
            </div>
            <span class="aqua-welcome-mark" aria-hidden="true">≈</span>
        </header>

        <nav class="aqua-tabs" aria-label="Seções do catálogo">
            <a href="#catalogo" :class="{ 'is-active': tab === 'catalogo' }" :aria-current="tab === 'catalogo' ? 'page' : null">Catálogo de peixes</a>
            <a href="#peixes" :class="{ 'is-active': tab === 'peixes' }" :aria-current="tab === 'peixes' ? 'page' : null">Cadastrar peixe</a>
            <a href="#categorias" :class="{ 'is-active': tab === 'categorias' }" :aria-current="tab === 'categorias' ? 'page' : null">Cadastrar categoria</a>
        </nav>

        <section x-show="tab === 'catalogo'" x-cloak class="aqua-panel" aria-labelledby="catalog-title">
            <div class="aqua-panel-heading">
                <div><span class="auth-kicker">EXPLORE SEU CATÁLOGO</span><h2 id="catalog-title">Peixes e suas categorias</h2><p>Uma visão de cada peixe e do tipo ao qual ele pertence.</p></div>
                <a href="#peixes" class="aqua-button">+ Cadastrar peixe</a>
            </div>
            <div class="aqua-demo-note">Prévia do layout · Os registros abaixo são exemplos ilustrativos.</div>
            <div class="aqua-table-scroll">
                <table class="aqua-table">
                    <caption class="sr-only">Exemplos de peixes com nome, cor e categoria</caption>
                    <thead><tr><th scope="col">Peixe</th><th scope="col">Cor</th><th scope="col">Categoria</th></tr></thead>
                    <tbody>
                        <tr><td><span class="aqua-fish-avatar" aria-hidden="true">01</span><strong>Betta</strong></td><td><span class="aqua-color aqua-color-blue" aria-hidden="true"></span>Azul</td><td><span class="aqua-badge">Água doce</span></td></tr>
                        <tr><td><span class="aqua-fish-avatar" aria-hidden="true">02</span><strong>Peixe-palhaço</strong></td><td><span class="aqua-color aqua-color-orange" aria-hidden="true"></span>Laranja e branco</td><td><span class="aqua-badge">Água salgada</span></td></tr>
                        <tr><td><span class="aqua-fish-avatar" aria-hidden="true">03</span><strong>Peixe-dourado</strong></td><td><span class="aqua-color aqua-color-gold" aria-hidden="true"></span>Dourado</td><td><span class="aqua-badge">Água doce</span></td></tr>
                    </tbody>
                </table>
            </div>
            <div class="aqua-table-footer">Cada peixe tem seu espaço. Cada detalhe, seu lugar.</div>
        </section>

        <section x-show="tab === 'peixes'" x-cloak class="aqua-panel" aria-labelledby="fish-title">
            <div class="aqua-panel-heading"><div><span class="auth-kicker">MAIS VIDA NO SEU CATÁLOGO</span><h2 id="fish-title">Cadastrar peixe</h2><p>Preencha as informações do peixe e escolha sua categoria.</p></div><span class="aqua-badge">Novo peixe</span></div>
            <div class="aqua-form-layout">
                <form class="auth-form aqua-entry-form" @submit.prevent>
                    <div><label for="fish-name">Nome do peixe <span aria-hidden="true">*</span></label><input id="fish-name" name="name" type="text" class="auth-input" placeholder="Ex.: Betta" required></div>
                    <div class="aqua-field-row">
                        <div><label for="fish-color">Cor <span aria-hidden="true">*</span></label><input id="fish-color" name="color" type="text" class="auth-input" placeholder="Ex.: Azul" required></div>
                        <div><label for="fish-category">Categoria <span aria-hidden="true">*</span></label><select id="fish-category" name="type_id" class="auth-input" required><option value="" disabled selected>Selecione uma categoria</option><option value="exemplo-doce">Água doce (exemplo)</option><option value="exemplo-salgada">Água salgada (exemplo)</option></select></div>
                    </div>
                    <p class="aqua-field-help">* Campos obrigatórios. As categorias disponíveis nesta prévia são ilustrativas.</p>
                    <div class="aqua-form-actions"><button type="reset" class="aqua-button-secondary">Limpar campos</button><button type="button" class="aqua-button" disabled>Salvar peixe</button></div>
                    <p class="aqua-layout-note">Prévia de layout: o salvamento ainda não está conectado.</p>
                </form>
                <aside class="aqua-form-aside"><span class="aqua-aside-symbol" aria-hidden="true">≈</span><h3>Os detalhes fazem a diferença.</h3><p>Use um nome fácil de identificar e informe a cor predominante do peixe.</p><a href="#categorias">Precisa de uma categoria? Crie aqui →</a></aside>
            </div>
        </section>

        <section x-show="tab === 'categorias'" x-cloak class="aqua-panel" aria-labelledby="category-title">
            <div class="aqua-panel-heading"><div><span class="auth-kicker">ORGANIZE POR TIPO</span><h2 id="category-title">Cadastrar categoria</h2><p>Crie os tipos que vão organizar os peixes do seu catálogo.</p></div><span class="aqua-badge">Nova categoria</span></div>
            <div class="aqua-form-layout">
                <form class="auth-form aqua-entry-form" @submit.prevent>
                    <div><label for="category-name">Nome da categoria <span aria-hidden="true">*</span></label><input id="category-name" name="name" type="text" class="auth-input" placeholder="Ex.: Água doce" required><p class="aqua-field-help">Escolha um nome curto e fácil de reconhecer.</p></div>
                    <div class="aqua-form-actions"><button type="reset" class="aqua-button-secondary">Limpar campos</button><button type="button" class="aqua-button" disabled>Salvar categoria</button></div>
                    <p class="aqua-layout-note">Prévia de layout: o salvamento ainda não está conectado.</p>
                </form>
                <aside class="aqua-form-aside"><span class="aqua-aside-symbol" aria-hidden="true">≋</span><h3>Tudo no seu lugar.</h3><p>As categorias representam os tipos de peixe e ajudam a manter o catálogo organizado.</p><a href="#catalogo">Conhecer o catálogo →</a></aside>
            </div>
        </section>
    </div>
</x-app-layout>
