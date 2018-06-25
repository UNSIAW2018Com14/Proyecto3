@extends ('layout')
@section('content')
<script  type="text/javascript" src="js/youtube.js" async></script>
<div id="headerEstilo1" class="container-fluid">
    <div class="row sect">  
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sect">
            <div class="imagenPortada" > 
                <img id="imgPortada" src="images/logo.png" class="imagenPortada"  alt="Imagen portada" style="width:100%;">
            </div>
        </div>
    </div>
</div>    
<div class="row" style="width:100%;">
    <div class="col-sm-6" >
        <img class="logoTorneo" src="images/logoTorneo.png" alt="Imagen logo" >
    </div>
    <div class="col-sm-6">
        <div id="player"></div>
      
    </div>
</div>
<hr>        
<hr>
<div class="row" id="descripcion">
    <div class="col-sm-12">
        <div id="parrafo">
            <h3> Game Description </h3>
            <p  class= "fondoColor, descripcion">     
            Hearthstone, originally Hearthstone: Heroes of Warcraft, is a free-to-play online collectible card video game developed and published by Blizzard Entertainment. Having been released worldwide on March 11, 2014, Hearthstone builds upon the already existing lore of the Warcraft series by using the same elements, characters, and relics. It was first released for Microsoft Windows and macOS, with support for iOS and Android devices being added later. The game features cross-platform play, allowing players on any supported device to compete with each other, restricted only by geographical region account limits.
            <br>
            The game is a turn-based card game between two opponents, using constructed decks of 30 cards along with a selected hero with a unique power. Players use their limited mana crystals to play abilities or summon minions to attack the opponent, with the goal of reducing the opponent's health to zero. Winning matches and completing quests earn in-game gold, rewards in the form of new cards, and other in-game prizes. Players can then buy packs of new cards through gold or microtransactions to customize and improve their decks. The game features several modes of play, including casual and ranked matches, as well as single-player adventures. New content for the game involves the addition of new card sets and gameplay, taking the form of either expansion packs or adventures that reward the player with collectible cards upon completion.
            </p>
        </div>
    </div>
</div>
<hr>
@endsection


