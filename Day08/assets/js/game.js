var Tabuleiro = Class.extend({
	config: null,
	canvas: null,
	embarcacoes: null,
	player: null,
	tirosRecebidos: null,
	
	init: function(canvas, config){
		this.config = $.extend({}, Tabuleiro.defaultConfig, config);
		this.canvas = $(canvas);
		this.embarcacoes = [];
		this.tirosRecebidos = 0;
		this.criarTabuleiro();
	},
	
	criarTabuleiro: function(){
		// primeiro, criando a linha superior
		for(var col=1; col<=this.config.colunas; col++){
			var cell = this._createCell('x-letra-topo');
			cell.html( this.config.letrasNoTopo ? this.config.alfabeto[col-1] : col)
				.css({left: col*this.config.largura});
		}
		
		// agora, criando a primeira coluna
		for(var row=1; row<=this.config.linhas; row++){
			var cell = this._createCell('x-letra-linha');
			cell.html( !this.config.letrasNoTopo ? this.config.alfabeto[row-1] : row)
				.css({top: row*this.config.altura});
		}
		
		// finalmente, criando as outras celulas
		var j =1;
		for(var row=1; row<=this.config.linhas; row++){
			for(var col=1; col<=this.config.colunas; col++){
				var cell = this._createCell('x-celula');
				cell.css({
					top: (row) * this.config.altura,
					left: (col) * this.config.largura,
					zIndex: j++
				}).data('posicao', [row, col]).addClass('cell-'+row+'-'+col);
				
				if(col == this.config.colunas){
					cell.css('border-right', '1px solid black');
				}
				
				if(row == this.config.linhas){
					cell.css('border-bottom', '1px solid black');
				}
			}
		}
		
		this.canvas.css({
			width: (this.config.colunas+1) * this.config.largura + 5,
			height: (this.config.linhas+1) * this.config.altura + 5
		});
	},
	
	adicionarEmbarcacao: function(embarcacao, orientacao, linha, coluna){
		this.canvas.append(embarcacao.getElemento());
		
		embarcacao.setOrientacao(orientacao);
		embarcacao.pos.iniCell = {row: linha, col: coluna};
		
		if(orientacao == Embarcacao.HORIZONTAL) {
			embarcacao.pos.endCell = {row: linha, col: coluna+embarcacao.tamanho-1};
		} else {
			embarcacao.pos.endCell = {row: linha+embarcacao.tamanho-1, col: coluna};
		}
		
		embarcacao.getElemento().css({
			left: embarcacao.pos.iniCell.col * this.config.largura,
			top: embarcacao.pos.iniCell.row * this.config.altura,
			zIndex: 0
		});
		
		var ini = embarcacao.pos.iniCell, fim = embarcacao.pos.endCell;
		var lista = this.getCelulas(ini.row, ini.col, fim.row, fim.col);
		$.each(lista, function(idx, cell){
			cell.addClass('ocupado');
		});
		
		this.embarcacoes.push(embarcacao);
	},
	
	adicionarEmbarcacaoAleatoria: function(embarcacao){
		var dir, iniRow, iniCol, endRow, endCol, valido, inter;
		while(true){
			dir = Math.random() < .5 ? Embarcacao.VERTICAL : Embarcacao.HORIZONTAL;
			iniRow = Math.max(1, Math.round(Math.random() * this.config.linhas));
			iniCol = Math.max(1, Math.round(Math.random() * this.config.colunas));
			endRow = dir == Embarcacao.VERTICAL ? iniRow + embarcacao.tamanho - 1: iniRow;
			endCol = dir == Embarcacao.HORIZONTAL ? iniCol + embarcacao.tamanho - 1: iniCol;
			valido = true;
			
			if(endRow > this.config.linhas || endCol > this.config.colunas){
				continue;
			}
			
			var lista = this.getCelulas(iniRow, iniCol, endRow, endCol);
			$.each(lista, function(idx, cell){
				if(cell.hasClass('ocupado')){
					valido = false;
					return false;
				}
			});
			
			if(valido){
				break;
			}
		}
		this.adicionarEmbarcacao(embarcacao, dir, iniRow, iniCol);
	},
	
	
	exibirEmbarcacoes: function(flag){
		flag ? this.canvas.find('.x-embarcacao').show() : this.canvas.find('.x-embarcacao').hide();
	},
	
	setPlayer: function(player){
		this.player = player;
	},
	
	getPlayer: function(){
		return this.player;
	},
	
	getCelulas: function(row1, col1, row2, col2){
		var lista = [], row = row1, col = col1;
		
		while(true){
			var last = false;
			
			if(row == row2 && col == col2){
				last = true;
			}
			
			lista.push(this.getCelula(row, col));
			
			if(col > col2) col--
			else if(col < col2) col ++;
			
			if(row > row2) row--
			else if(row < row2) row ++;
			
			if(last){
				break;
			}
		}
		
		
		return lista;
	},
	
	getCelula: function(row, col){
		return this.canvas.find('.cell-'+row+'-'+col);
	},
	
	verificaTiro: function(coord){
		
		var result = null;
		var cell = this.getCelula(coord.linha, coord.coluna);
		var hit = null;
		
		if(cell.hasClass('atirado')){
			result = Tabuleiro.TIRO_INVALIDO;
			
		} else {
			$.each(this.embarcacoes, $.proxy(function(idx, item){
				var iniCol = item.pos.iniCell.col,
					iniRow = item.pos.iniCell.row,
					endCol = item.pos.endCell.col,
					endRow = item.pos.endCell.row;
				
				var celulas = this.getCelulas(iniRow, iniCol, endRow, endCol);
				var ref = this;
				var found = false;
				
				$.each(celulas, function(idx, celula) {
					var point = celula.data('posicao');
					
					if(coord.linha == point[0] && coord.coluna == point[1]){
						result = Tabuleiro.TIRO_ACERTO;
						cell.addClass('tiro_acerto');
						ref._verificaDerrubado(item);
						hit = item;
						found = true;
						return false;
					}
				});
			
				if(found){
					return false;
				}
			
			}, this));
			
			
			if(result == null){
				cell.addClass('tiro_agua');
				result = Tabuleiro.TIRO_AGUA;
			}
			
			cell.addClass('atirado');
		}
		
		$(this).triggerHandler('logTiro', [coord, result, hit]);
		
		if(result != Tabuleiro.TIRO_INVALIDO && ++this.tirosRecebidos == BatalhaNaval.tirosPorRodada){
			this.tirosRecebidos = 0;
			$(this).triggerHandler('maxTirosRecebidos');
		}
		
		return result;
	},
	
	_verificaDerrubado: function(emb){
		var p1 = emb.pos.iniCell;
		var p2 = emb.pos.endCell;
		var celulas = this.getCelulas(p1.row, p1.col, p2.row, p2.col);
		
		var acertos = 0;
		$.each(celulas, function(i,cell){
			if(cell.hasClass('tiro_acerto')){
				acertos++;
			}
		});
		
		if(acertos == celulas.length){
			$.each(celulas, function(i,cell){
				cell.removeClass('tiro_acerto').addClass('x-derrubado').css('opacity', .5);
			});
			
			// exibindo o derrubado
			emb.getElemento().find('div').show();
			// removendo a embarcacao da lista
			this.embarcacoes.splice(this.embarcacoes.indexOf(emb), 1);
			// disparando o evento
			$(this).triggerHandler('embarcacaoDerrubada', [emb]);
			// se nao tem mais embarcacoes
			if(this.embarcacoes.length == 0){
				$(this).triggerHandler('tudoDestruido');
			}
		}
	},
	
	_createCell: function(cls){
		var cell = $('<div></div>').appendTo(this.canvas);
		
		cell.addClass(cls).css({
			top: 0,
			left: 0,
			width: this.config.largura,
			height: this.config.altura,
			lineHeight: this.config.altura + 'px',
			position: 'absolute'
		});
		
		return cell;
	}
	
});

/// Definições do tamanho do tabuleiro
Tabuleiro.defaultConfig = {
	linhas: 15,
	colunas: 15,
	alfabeto: 'A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z'.split(','),
	largura: 30,
	altura: 30,
	letrasNoTopo: false
}
// definindo tiros pra mostrar mensagens
Tabuleiro.TIRO_INVALIDO = -1;
Tabuleiro.TIRO_AGUA     =  0;
Tabuleiro.TIRO_ACERTO   =  1;

// Class base to create ships.. 
var Embarcacao = Class.extend({
	tamanho: 0,
	orientacao: '',
	cls: '',
	angulo: 0,
	
	_elemento: null,
	
	init: function(){
		this.pos = {
			iniCell: {col: 0, row: 0},
			endCell: {col: 0, row: 0}
		};
	},
	
	setOrientacao: function (orientacao){
		this.orientacao = orientacao;
		if(orientacao == Embarcacao.VERTICAL){
			this.angulo = 90;
		} else {
			this.angulo = 0;
		}
		
		this.getElemento().css({
			WebkitTransform: 'rotate('+this.angulo+'deg)'
			,'-moz-transform': 'rotate('+this.angulo+'deg)'
		});
	},
	
	getOrientacao: function(){
		return this.orientacao;
	},
	
	getElemento: function(){
		if(this._elemento == null){
			this._elemento = $('<div><div></div></div>');
			var graph = this._elemento.find('div:first');
			
			this._elemento.css({
				width: Tabuleiro.defaultConfig.largura,
				height: Tabuleiro.defaultConfig.altura,
				position: 'absolute'
			});
			
			graph.css({
				width: Tabuleiro.defaultConfig.largura * this.tamanho,
				height: Tabuleiro.defaultConfig.altura
			}).addClass('x-embarcacao').addClass(this.cls);
		}
		
		return this._elemento;
	}
})

Embarcacao.VERTICAL = 'v';
Embarcacao.HORIZONTAL = 'h';

// All option of ships for this game

var Submarino = Embarcacao.extend({
	tamanho: 1,
	cls: 'submarino'
});

var Cruzador = Embarcacao.extend({
	tamanho: 2,
	cls: 'cruzador'
});

var Hidroaviao = Embarcacao.extend({
	tamanho: 3,
	cls: 'hidroaviao'
});

var Encouracado = Embarcacao.extend({
	tamanho: 4,
	cls: 'encouracado'
});

var PortaAviao = Embarcacao.extend({
	tamanho: 5,
	cls: 'porta-aviao'
});


// ************ Class for the player ***********************
var Player = Class.extend({
	_tabuleiro: null,
	nome: null, // Need to do a form to take the name
	
	init: function(nome){
		this.nome = nome;
	},
	
	start: function(){
		alert('Now its your turn!');
	},
	
	setTabuleiroContra: function(tabuleiro){
		this._tabuleiro = tabuleiro;
		tabuleiro.canvas.find('.x-celula').click($.proxy(this.celula_clickHandler, this));
	},
	
	jogar: function(coord){
		var result = this._tabuleiro.verificaTiro(coord);
		if( result == Tabuleiro.TIRO_INVALIDO ){
			alert('Dont be dumb.. you aready shooted there. Try again!');
		}
	},
	
	limparPontosImpacto: function(){
		
	},
	
	celula_clickHandler: function(evt){
		if(BatalhaNaval.jogadorAtual == this){
			var p = $(evt.currentTarget).data('posicao');
			this.jogar({
				linha: p[0], 
				coluna: p[1]
			});
		}
	}
});


// classe para CPU
var CPU = Player.extend({
	
	lastSucessfullHitPoint: null,
	prevLastSucessfullHitPoint: null,
	derrubou: false,
	direction: null,
	ultimaEmbarcacao: null,
	
	setTabuleiroContra: function(tabuleiro){
		this._tabuleiro = tabuleiro;
		$(tabuleiro).bind('embarcacaoDerrubada', $.proxy(this.limparPontosImpacto, this));
		$(tabuleiro).bind('logTiro', $.proxy(this.tabuleiro_logTiroHandler, this));
	},
	
	start: function(){
		alert('This is the '+this.nome+' turns. Wait...');
		this.jogar(this.null);
	},
	
	jogar: function(coord){
		var tiro = 0;
		
		var inter = setInterval($.proxy(function(){
			var point;
			if(this.lastSucessfullHitPoint != null) {
				point = this._getNearestValidPoint();
			} else {
				point = this._getRandomTargetPoint();
			}
			
			var result = this._tabuleiro.verificaTiro(point);
			
			if(result != Tabuleiro.TIRO_INVALIDO){
				tiro++;
			} 
			
			if(tiro == BatalhaNaval.tirosPorRodada){
				clearInterval(inter);
			}
			
		}, this), 1500);
	},
	
	
	limparPontosImpacto: function(evt){
		this.prevLastSucessfullHitPoint = null;
		this.lastSucessfullHitPoint = null;
		this.derrubou = true;
		this.direction = null;
		this.ultimaEmbarcacao = null;
		
		// Check if there are another place with "acerto" (boat shooted)
		var res = this._tabuleiro.canvas.find('.tiro_acerto');
		if(res.length){
			var p = $(res[0]).data('posicao');
			this.lastSucessfullHitPoint = {
				linha: p[0],
				coluna: p[1]
			}
		}
	},
	
	_getNearestValidPoint: function(){
		var p = this.prevLastSucessfullHitPoint, l = this.lastSucessfullHitPoint,
			lookaheadCol = 0,
			lookaheadRow = 0;
		
		// se tiver um ponto antes do ultimo
		if(p || this.direction){
			if(p){
				// Check if there are line or column
				if(p.coluna < l.coluna) {
					lookaheadCol = 1;
					this.direction = Embarcacao.HORIZONTAL;
				} else if(p.coluna > l.coluna) {
					lookaheadCol = -1;
					this.direction = Embarcacao.HORIZONTAL;
				} else if(p.linha < l.linha) {
					lookaheadRow = 1;
					this.direction = Embarcacao.VERTICAL;
				} else if(p.linha > l.linha) {
					lookaheadRow = -1;
					this.direction = Embarcacao.VERTICAL;
				}
			} else {
				if(this.direction == Embarcacao.VERTICAL){
					lookaheadRow = 1;
				} else {
					lookaheadCol = 1;
				}
			}
			
			// agora, vamos procurar a celula mais proxima
			// que ainda nao foi feito tiro
			var c=l.coluna, r=l.linha, cell;
			if(this.direction == Embarcacao.VERTICAL){
				while(true){
					r += lookaheadRow;
					if(r > this._tabuleiro.config.linhas){
						lookaheadRow = -1;
						continue;
					}
					if(r < 1){
						lookaheadRow = 1;
						continue;
					}
					cell = this._tabuleiro.getCelula(r, c);
					if(cell.hasClass('tiro_agua')){
						lookaheadRow *= -1;
						continue
					}
					if(cell.hasClass('atirado')){
						continue;
					}
					// se chegou ate aqui, eh uma celula valida
					break;
				}
			}
			
			if(this.direction == Embarcacao.HORIZONTAL){
				while(true){
					c += lookaheadCol;
					if(c > this._tabuleiro.config.colunas){
						lookaheadCol = -1;
						continue;
					}
					if(c < 1){
						lookaheadCol = 1;
						continue;
					}
					cell = this._tabuleiro.getCelula(r, c);
					if(cell.hasClass('tiro_agua')){
						lookaheadCol *= -1;
						continue
					}
					if(cell.hasClass('atirado')){
						continue;
					}
					// se chegou ate aqui, eh uma celula valida
					break;
				}
			}
			
			var p = {
				linha: r,
				coluna: c
			}
			
			return p;
			
		// se nao tem um ponto antes do ultimo
		} else if(l) {
			// vamos verificar os pontos ao redor do anterior
			var c = [];
			for(var i=1; i<=5; i++){
				c.push({r: l.linha-i, c:l.coluna});
				c.push({r: l.linha, c:l.coluna+i});
				c.push({r: l.linha+i, c:l.coluna});
				c.push({r: l.linha, c:l.coluna-i});
			}
			
			for(var i=0; i<c.length; i++){
				var cell = c[i];
				
				cell.r = Math.min(this._tabuleiro.config.linhas, cell.r);
				cell.c = Math.min(this._tabuleiro.config.colunas, cell.c);
				cell.r = Math.max(cell.r, 1);
				cell.c = Math.max(cell.c, 1);
				
				if(!this._tabuleiro.getCelula(cell.r, cell.c).hasClass('atirado')){
					return {
						linha: cell.r,
						coluna: cell.c
					};
				}
			}
		}
		
		return this._getRandomTargetPoint();
	},
	
	_getRandomTargetPoint : function(){
		var col = Math.max(1, Math.round(Math.random() * this._tabuleiro.config.colunas));
		var row = Math.max(1, Math.round(Math.random() * this._tabuleiro.config.linhas));
		
		var point = {
			linha: row,
			coluna: col
		};
		
		return point;
	},
	
	celula_clickHandler: function(evt){
		
	},
	
	tabuleiro_logTiroHandler: function(evt, coord, result, item){
		var point = coord;
		
		if(result != Tabuleiro.TIRO_INVALIDO){
			this.prevLastSucessfullHitPoint = null;
		} 
		
		if(this.derrubou){
			this.derrubou = false;
			point = null;
		}
		
		if(result == Tabuleiro.TIRO_ACERTO && point){
			
			// se acertou a embarcacao, mas nao eh a mesma da anterior
			if(this.ultimaEmbarcacao && this.ultimaEmbarcacao != item){
				this.prevLastSucessfullHitPoint = null;
				this.direction = null;
				console.log(item);
			} else {
				this.prevLastSucessfullHitPoint = this.lastSucessfullHitPoint;
			}
			
			this.ultimaEmbarcacao = item;
			this.lastSucessfullHitPoint = point;
		}
	}
});


var BatalhaNaval = {
	tirosPorRodada: 3,
	
	tabuleiro1: null,
	tabuleiro2: null,
	
	jogadorAtual: null,
	tabuleiroAtual: null,
	logCanvas: null,
	
	
	setup: function(tabuleiro1, tabuleiro2, logCanvas){
		tabuleiro1.getPlayer().setTabuleiroContra(tabuleiro2);
		tabuleiro2.getPlayer().setTabuleiroContra(tabuleiro1);
		
		this.tabuleiro1 = tabuleiro1;
		this.tabuleiro2 = tabuleiro2;
		
		this.logCanvas = logCanvas;
		
		$(this.tabuleiro1).bind('maxTirosRecebidos', $.proxy(this.switchCurrentPlayer, this));
		$(this.tabuleiro2).bind('maxTirosRecebidos', $.proxy(this.switchCurrentPlayer, this));
		
		$(this.tabuleiro1).bind('logTiro', $.proxy(this.logDeTiro, this));
		$(this.tabuleiro2).bind('logTiro', $.proxy(this.logDeTiro, this));
		
		$(this.tabuleiro1).bind('embarcacaoDerrubada', $.proxy(this.embarcacaoDerrubada, this));
		$(this.tabuleiro2).bind('embarcacaoDerrubada', $.proxy(this.embarcacaoDerrubada, this));
		
		$(this.tabuleiro1).bind('tudoDestruido', $.proxy(this.tudoDestruido, this));
		$(this.tabuleiro2).bind('tudoDestruido', $.proxy(this.tudoDestruido, this));
		
		this.switchCurrentPlayer();
	},
	
	switchCurrentPlayer: function(){
		var inativar;
		if(this.tabuleiroAtual == null || this.tabuleiroAtual == this.tabuleiro1){
			this.tabuleiroAtual = this.tabuleiro2;
			this.jogadorAtual = this.tabuleiro1.getPlayer();
			inativar = this.tabuleiro1;
		} else {
			this.tabuleiroAtual = this.tabuleiro1;
			this.jogadorAtual = this.tabuleiro2.getPlayer();
			inativar = this.tabuleiro2;
		}
		
		inativar.canvas.css({opacity: 0.2});
		this.tabuleiroAtual.canvas.css({opacity: 1});
		this.jogadorAtual.start();
	},

	/************************* LOGS ******************************** */
	logDeTiro: function(evt, coord, result, item){
		switch(result){
			case Tabuleiro.TIRO_AGUA:
				this.log(coord, this.jogadorAtual.nome + ' deu um tiro na água');
			break;
			case Tabuleiro.TIRO_ACERTO:
				this.log(coord, this.jogadorAtual.nome + ' acertou um ' + item.cls);
			break;
		}
	},
	
	embarcacaoDerrubada: function(evt, emb){
		this.log(null, this.jogadorAtual.nome + ' derrubou um ' + emb.cls + '!');
	},
	
	tudoDestruido: function(evt){
		this.log(null, 'Tudo destruido em '+evt.currentTarget.canvas.attr('id'));
		
		$(this.tabuleiro1).unbind('maxTirosRecebidos', $.proxy(this.switchCurrentPlayer, this));
		$(this.tabuleiro2).unbind('maxTirosRecebidos', $.proxy(this.switchCurrentPlayer, this));
		
		this.tabuleiro1.exibirEmbarcacoes(true);
		this.tabuleiro2.exibirEmbarcacoes(true);
		
		alert(this.jogadorAtual.nome + ' Is the Winner!');
	},
	
	log: function(coord, msg){
		this.logCanvas.prepend('<p>' + (coord ? this.tabuleiroAtual.config.alfabeto[coord.linha-1] + '' + coord.coluna + ' - ' : '') + msg + '</p>');
	}
}
