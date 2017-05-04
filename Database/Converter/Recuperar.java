import java.io.*;
import java.util.*;
/**
 * 
 */
public class Recuperar {
    private static String textoUno = "C:\\Users\\Lydia\\Desktop\\RecuperacionBases\\texto\\Aulas.txt";
    private static String textoDos = "C:\\Users\\Lydia\\Desktop\\RecuperacionBases\\texto\\AulasNuevo.txt";
    private static String textoTres = "C:\\Users\\Lydia\\Desktop\\RecuperacionBases\\texto\\RevisionesNuevo.txt";

    private String parametros[]={"MatCodig:","MatNumSe:","MatNumMe:","MatNumCo:","MatCant:","MatTipo:","MatDescr:","MatMarca:","MatLocal:","$Revisions:","$UpdatedBy:"};
    private ArrayList<String> parametrosList= new ArrayList<String>();
    private String parametrosLimpios[] = new String [parametros.length];
    private int iteraciones=49;
    private boolean modificacionEnVector=false;

    public Recuperar(String t1, String t2, String t3){
        textoUno=t1;
        textoDos=t2;
        textoTres=t3;
        for(int i=0;i<parametrosLimpios.length;i++){
            parametrosLimpios[i]="";
        }
    }

    public void obtener() {
        try{
            FileReader in = new FileReader(textoUno);
            FileWriter out1 = new FileWriter(textoDos);
            FileWriter out2 = new FileWriter(textoTres);
            for(int i=0;i<parametros.length;i++){
                parametrosList.add(parametros[i]);
            }
            int leido;
            while((leido = in.read()) != -1){
                String iteracion = Integer.toString(iteraciones-48);
                String provisional="";
                boolean enter=false;
                while(enter==false && (char)leido != ' ' && (char)leido != '\n'){
                    char c = (char)leido;
                    provisional+=c;
                    if(provisional.equals("\r")){
                        enter=true;
                        leido=in.read();
                    } else {
                        leido=in.read();
                    }
                }
                int posProv = parametrosList.indexOf(provisional);
                if(!enter && (posProv!=-1)){
                    leido=in.read();
                }
                if(posProv==1 || posProv==3 || posProv==4 || posProv==5 || posProv==6 || posProv==7 || posProv==8){
                    while((char)leido != '\r'){
                        char c = (char)leido;
						parametrosLimpios[posProv]+=c;
                        leido=in.read();
                    }
                    leido=in.read();
                    modificacionEnVector=true;
                } else if(posProv==9){ 
                    while((char)leido != '\r'){
                        out2.write(iteracion+';');
                        if((char)leido==' ' || (char)leido==','){
                            leido = in.read();
                            while((char)leido!=' '){
                                out2.write(leido);
                                leido = in.read();
                            }
                            out2.write(';');
                            leido = in.read();
                            while((char)leido!=',' && (char)leido!='\r'){
                                out2.write(leido);
                                leido = in.read();
                            }
                            out2.write("\r\n");
                        }
                    }
                    leido = in.read();
                    modificacionEnVector=true;
                } else if(posProv==10){
                    while((char)leido != '\r'){
                        leido=in.read();
                    }
                    leido=in.read();
                    modificacionEnVector=true;
                } else if(posProv==-1){
                    if(modificacionEnVector){
                        out1.write(iteracion+';');
                        for(int i=0;i<parametrosLimpios.length;i++){
                            out1.write(parametrosLimpios[i]+';');
                            parametrosLimpios[i]="";
                        }
                        out1.write("\r\n");
                        iteraciones++;
                        modificacionEnVector=false;
                    }
                } else {
                    while((char)leido != '\r'){
                        leido=in.read();
                    }
                    leido=in.read();
                    modificacionEnVector=true;
                }
            }
            in.close();
            out1.close();
            out2.close();
        }
        catch(FileNotFoundException e){
            System.out.println("No existe el fichero");
        }
        catch(IOException e){
            System.out.println("Error E/S");
        }
    }

    public static void main(String[] args) {
        Recuperar recuperando = new Recuperar(textoUno,textoDos,textoTres);
        recuperando.obtener();
    }
}
