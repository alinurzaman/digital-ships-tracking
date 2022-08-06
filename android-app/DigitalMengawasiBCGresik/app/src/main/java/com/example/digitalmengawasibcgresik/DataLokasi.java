package com.example.digitalmengawasibcgresik;

public class DataLokasi {
    private String id, namalokasi;
    public DataLokasi(){

    }

    public DataLokasi(String id, String namalokasi){
        this.id = id;
        this.namalokasi = namalokasi;
    }

    public String getId(){
        return id;
    }

    public String getNamalokasi(){
        return namalokasi;
    }

    public void setId(String id){
        this.id = id;
    }

    public void setNamalokasi(String namalokasi){
        this.namalokasi = namalokasi;
    }
}
