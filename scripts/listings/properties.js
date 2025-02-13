const properties = [
    //  ------ villa Properties START ------
    //
    //1st Property (I-villa-rent)
    { 
        id: 1, 
        type: "villa", 
        status: "for-rent", 
        bedroom: "3bedroom", 
        price: 5500, 
        images: [
            "../assets/villas/I-villa-rent/villa-frontView.jpeg", 
            "../assets/villas/I-villa-rent/villa-backyard.jpeg",
            "../assets/villas/I-villa-rent/villa-livingRoom.jpeg",
            "../assets/villas/I-villa-rent/villa-kitchen.jpeg", 
            "../assets/villas/I-villa-rent/1st_bedroom_rental_villa.jpg",
            "../assets/villas/I-villa-rent/2nd_bedroom_rental_villa.jpg",
            "../assets/villas/I-villa-rent/3rd_bedroom_rental_villa.jpg", 
            "../assets/villas/I-villa-rent/1st_bathroom_villa.jpeg",
            "../assets/villas/I-villa-rent/2nd_bathroom_villa.jpeg",
        ] 
    },
    //
    //2nd Property (II-villa-rent)
    //
    { 
        id: 2, 
        type: "villa", 
        status: "for-rent", 
        bedroom: "2bedroom", 
        price: 4800, 
        images: [
            "../assets/villas/II-villa-rent/outside_view_villa.jpg", 
            "../assets/villas/II-villa-rent/living_room_in_a_rental_villa.jpeg",
            "../assets/villas/II-villa-rent/kitchen_villa.jpeg",
            "../assets/villas/II-villa-rent/1st_bedroom_villa.jpg", 
            "../assets/villas/II-villa-rent/1st_bathroom_villa.jpg",
            "../assets/villas/II-villa-rent/2nd_bedroom_villa.jpg",
            "../assets/villas/II-villa-rent/2nd_bathroom_villa.jpg",
        ] 
    },
    //
    //3rd Property (III-villa-rent)
    //
    { 
        id: 3, 
        type: "villa", 
        status: "for-rent", 
        bedroom: "2bedroom", 
        price: 3200, 
        images: [
            "../assets/villas/III-villa-rent/villa_front_view.jpg", 
            "../assets/villas/III-villa-rent/living_room_villa.jpg",
            "../assets/villas/III-villa-rent/backyard_villa.jpg",
            "../assets/villas/III-villa-rent/kitchen_villa.jpg", 
            "../assets/villas/III-villa-rent/1st_bedroom_villa.jpg",
            "../assets/villas/III-villa-rent/2nd_bedroom_villa.jpg",
            "../assets/villas/III-villa-rent/bathroom_villa.jpg",
        ] 
    },
    //
    //4th Property (IV-villa-Sale)
    //
    { 
        id: 4, 
        type: "villa", 
        status: "for-sale", 
        bedroom: "2bedroom", 
        price: 905000, 
        images: [
            "../assets/villas/IV-villa-sale/villa_front_view.jpeg", 
            "../assets/villas/IV-villa-sale/living_room_villa.jpeg",
            "../assets/villas/IV-villa-sale/kitchen_area_of_villa.jpeg",
            "../assets/villas/IV-villa-sale/1st_bedroom_of_a_villa.jpeg", 
            "../assets/villas/IV-villa-sale/2nd_bedroom_of_a_villa.jpeg",
            "../assets/villas/IV-villa-sale/bathroom_villa.jpeg",
        ] 
    },
    //
    //5th Property (V-villa-Sale)
    //
    { 
        id: 5, 
        type: "villa", 
        status: "for-sale", 
        bedroom: "3bedroom", 
        price: 3000000, 
        images: [
            "../assets/villas/V-villa-sale/front_view_villa.jpg", 
            "../assets/villas/V-villa-sale/living_room_villa.jpg",
            "../assets/villas/V-villa-sale/kitchen_area_villa.jpg",
            "../assets/villas/V-villa-sale/kitchen_of_villa.jpg", 
            "../assets/villas/V-villa-sale/1st_bedroom_villa.jpeg",
            "../assets/villas/V-villa-sale/1st_bathroom_villa.jpg",
            "../assets/villas/V-villa-sale/2nd_bedroom_villa.jpg", 
            "../assets/villas/V-villa-sale/2nd_bathroom_villa.jpg",
            "../assets/villas/V-villa-sale/3rd_bedroom_villa.jpg",
        ] 
    },
    //
    //  ------ villa Properties END ------
    //
    // ------ apartment Properties START ------
    //
    //6th Property (apartments-1Bed-rent)
    //
    { 
        id: 6, 
        type: "apartment", 
        status: "for-rent", 
        bedroom: "1bedroom", 
        price: 600, 
        images: [
            "../assets/apartments/1Bedroom/I-1bedroom-rent/1Bedroom_apartment_interior.jpeg",
            "../assets/apartments/1Bedroom/I-1bedroom-rent/1Bedroom-bedroom.jpeg",
            "../assets/apartments/1Bedroom/I-1bedroom-rent/1Bedroom-bathroom.jpeg",
        ] 
    },
    //
    //7th Property (apartments-1Bed-rent)
    //
    { 
        id: 7, 
        type: "apartment", 
        status: "for-rent", 
        bedroom: "1bedroom", 
        price: 650, 
        images: [
            "../assets/apartments/1Bedroom/II-1bedroom-rent/interior_of_1_bedroom_apartment.jpeg",
            "../assets/apartments/1Bedroom/II-1bedroom-rent/bedroom_in_a_1_bedroom_apartment.jpeg",
            "../assets/apartments/1Bedroom/II-1bedroom-rent/bathroom_in_1_bedroom_apartment.jpeg",
        ] 
    },
    //
    //8th Property (apartments-1Bed-sale)
    //
    { 
        id: 8, 
        type: "apartment", 
        status: "for-sale", 
        bedroom: "1bedroom", 
        price: 300000, 
        images: [
            "../assets/apartments/1Bedroom/III-1bedroom-sale/interior_of_1bedroom_apt.jpeg",
            "../assets/apartments/1Bedroom/III-1bedroom-sale/bedroom_for_1bed_apt.jpeg",
            "../assets/apartments/1Bedroom/III-1bedroom-sale/bathroom_of_1bed_apt.jpeg",
        ] 
    },
    //
    //9th Property (apartments-1Bed-sale)
    //
    { 
        id: 9, 
        type: "apartment", 
        status: "for-sale", 
        bedroom: "1bedroom", 
        price: 380000, 
        images: [
            "../assets/apartments/1Bedroom/IV-1bedroom-sale/interior_1bedroom_apartment.jpg",
            "../assets/apartments/1Bedroom/IV-1bedroom-sale/kitchen_1bedroom_apt.jpg",
            "../assets/apartments/1Bedroom/IV-1bedroom-sale/bedroom_apt_1bed.jpeg",
            "../assets/apartments/1Bedroom/IV-1bedroom-sale/bathroom_1bedroom_apt.jpg",
        ] 
    },
    //
    //10th Property (apartments-2Bed-rent)
    //
    { 
        id: 10, 
        type: "apartment", 
        status: "for-rent", 
        bedroom: "2bedroom", 
        price: 1900, 
        images: [
            "../assets/apartments/2Bedroom/I-2bedroom-rent/2bedroom-interior.jpeg",
            "../assets/apartments/2Bedroom/I-2bedroom-rent/2bedroom-kitchen_Area.jpeg",
            "../assets/apartments/2Bedroom/I-2bedroom-rent/1st_bedroom_2bedroom_of_apt.jpeg",
            "../assets/apartments/2Bedroom/I-2bedroom-rent/2nd_bedroom_of_2bedroom_apt.jpeg",
            "../assets/apartments/2Bedroom/I-2bedroom-rent/2bedroom-bathroom.jpeg",
        ] 
    },
    //
    //11th Property (apartments-2Bed-rent)
    //
    { 
        id: 11, 
        type: "apartment", 
        status: "for-rent", 
        bedroom: "2bedroom", 
        price: 2400, 
        images: [
            "../assets/apartments/2Bedroom/II-2bedroom-rent/interior_2_bedroom_apartment.jpeg",
            "../assets/apartments/2Bedroom/II-2bedroom-rent/Kitchen_2_bedroom_apartment.jpg",
            "../assets/apartments/2Bedroom/II-2bedroom-rent/1st_bedroom_of_2Bedroom.jpeg",
            "../assets/apartments/2Bedroom/II-2bedroom-rent/2nd_bedroom_of_2Bedroom.jpg",
            "../assets/apartments/2Bedroom/II-2bedroom-rent/bathroom_2_bedroom_apartment.jpeg",
        ] 
    },
    //
    //12th Property (apartments-2Bed-sale)
    //
    { 
        id: 12, 
        type: "apartment", 
        status: "for-sale", 
        bedroom: "2bedroom", 
        price: 580000, 
        images: [
            "../assets/apartments/2Bedroom/III-2bedroom-sale/interior_2bedroom_apt.jpeg",
            "../assets/apartments/2Bedroom/III-2bedroom-sale/1st_bedroom_of_2bed_apt.jpeg",
            "../assets/apartments/2Bedroom/III-2bedroom-sale/2nd_bedroom_of_2bed_apt.jpeg",
            "../assets/apartments/2Bedroom/III-2bedroom-sale/bathroom_2bedroom_apt.jpeg",
        ] 
    },
    //
    //13th Property (apartments-2Bed-sale)
    //
    { 
        id: 13, 
        type: "apartment", 
        status: "for-sale", 
        bedroom: "2bedroom", 
        price: 600000, 
        images: [
            "../assets/apartments/2Bedroom/IV-2bedroom-sale/interior_2bedroom_apartment.jpeg",
            "../assets/apartments/2Bedroom/IV-2bedroom-sale/1st_bedroom_of_2bed_apartment.jpeg",
            "../assets/apartments/2Bedroom/IV-2bedroom-sale/2nd_bedroom_of_2bed_aprtment.jpeg",
            "../assets/apartments/2Bedroom/IV-2bedroom-sale/bathroom_2bedroom_apartment.jpeg",
        ] 
    },
    //
    //14th Property (apartments-3Bed-rent)
    //
    { 
        id: 14, 
        type: "apartment", 
        status: "for-rent", 
        bedroom: "3bedroom", 
        price: 3300, 
        images: [
            "../assets/apartments/3Bedroom/I-3bedroom-rent/3bed-interior.jpeg",
            "../assets/apartments/3Bedroom/I-3bedroom-rent/3bedroom-kitchen.jpg",
            "../assets/apartments/3Bedroom/I-3bedroom-rent/1st_bedroom_of_3bed_apt.jpeg",
            "../assets/apartments/3Bedroom/I-3bedroom-rent/2nd_bedroom_of_3bed_apt.jpeg",
            "../assets/apartments/3Bedroom/I-3bedroom-rent/3bedroom_1st_bathroom.jpeg",
            "../assets/apartments/3Bedroom/I-3bedroom-rent/3rd_bedroom_of_3bed_apt.jpeg",
            "../assets/apartments/3Bedroom/I-3bedroom-rent/3bedroom_2nd_bathroom.jpeg",
        ] 
    },
    //
    //15th Property (apartments-3Bed-rent)
    //
    { 
        id: 15, 
        type: "apartment", 
        status: "for-rent", 
        bedroom: "3bedroom", 
        price: 3500, 
        images: [
            "../assets/apartments/3Bedroom/II-3bedroom-rent/interior_3bedroom.jpeg",
            "../assets/apartments/3Bedroom/II-3bedroom-rent/3bedroom_kitchen.jpg",
            "../assets/apartments/3Bedroom/II-3bedroom-rent/1st_bedroom_of_3bed_apt.jpeg",
            "../assets/apartments/3Bedroom/II-3bedroom-rent/2nd_bedroom_for_3bed_apt.jpeg",
            "../assets/apartments/3Bedroom/II-3bedroom-rent/1st_bathroom_of_3bedroom_apt.jpeg",
            "../assets/apartments/3Bedroom/II-3bedroom-rent/3rd_bedroom_for_3bed_apt.jpg",
            "../assets/apartments/3Bedroom/II-3bedroom-rent/2nd_bathroom_of_3bedroom_apt.jpg",
        ] 
    },
    //
    //16th Property (apartments-3Bed-sale)
    //
    { 
        id: 16, 
        type: "apartment", 
        status: "for-sale", 
        bedroom: "3bedroom", 
        price: 2100000, 
        images: [
            "../assets/apartments/3Bedroom/III-3bedroom-sale/livingRoom_3bedroom_apartment.jpeg",
            "../assets/apartments/3Bedroom/III-3bedroom-sale/3bedroom_apt_kitchen.jpeg",
            "../assets/apartments/3Bedroom/III-3bedroom-sale/1st_bedroom_of_3bed_apartment.jpeg",
            "../assets/apartments/3Bedroom/III-3bedroom-sale/2nd_bedroom_of_3bed_apartment.jpeg",
            "../assets/apartments/3Bedroom/III-3bedroom-sale/1st_bathroom_of_3bed_apt.jpeg",
            "../assets/apartments/3Bedroom/III-3bedroom-sale/3rd_bedroom_of_3bed_apartment.jpeg",
            "../assets/apartments/3Bedroom/III-3bedroom-sale/2nd_bathroom_of_3bed_apt.jpeg",
        ] 
    },
    //
    //17th Property (apartments-3Bed-sale)
    //
    { 
        id: 17, 
        type: "apartment", 
        status: "for-sale", 
        bedroom: "3bedroom", 
        price: 2400000, 
        images: [
            "../assets/apartments/3Bedroom/IV-3bedroom-sale/livingRoom_of_3bedroom_apt.jpeg",
            "../assets/apartments/3Bedroom/IV-3bedroom-sale/kitchen_3bedroom_apartment.jpeg",
            "../assets/apartments/3Bedroom/IV-3bedroom-sale/1st_bedroom_for_3bed_apt.jpeg",
            "../assets/apartments/3Bedroom/IV-3bedroom-sale/2nd_bedroom_for_3bed_apt.jpeg",
            "../assets/apartments/3Bedroom/IV-3bedroom-sale/bathroom_3bed_apt.jpg",
            "../assets/apartments/3Bedroom/IV-3bedroom-sale/3rd_bedroom_for_3bed_apt.jpeg",
        ] 
    },
    //
    //18th Property (apartments-studio-rent)
    //
    { 
        id: 18, 
        type: "apartment", 
        status: "for-rent", 
        bedroom: "studio", 
        price: 450, 
        images: [
            "../assets/apartments/Studio/I-studio-rent/studio-interior.jpeg",
            "../assets/apartments/Studio/I-studio-rent/studio-bathroom.jpeg",
        ] 
    },
    //
    //19th Property (apartments-studio-rent)
    //
    { 
        id: 19, 
        type: "apartment", 
        status: "for-rent", 
        bedroom: "studio", 
        price: 500, 
        images: [
            "../assets/apartments/Studio/II-studio-rent/interior_studio_apartment.jpeg",
            "../assets/apartments/Studio/II-studio-rent/bathroom_studio.jpeg",
        ] 
    },
    //
    //20th Property (apartments-studio-sale)
    //
    { 
        id: 20, 
        type: "apartment", 
        status: "for-sale", 
        bedroom: "studio", 
        price: 92000, 
        images: [
            "../assets/apartments/Studio/III-studio-sale/interior_studio_apartment.jpeg",
            "../assets/apartments/Studio/III-studio-sale/bathroom_studio_apartment.jpeg",
        ] 
    },
    //
    //21st Property (apartments-studio-sale)
    //
    { 
        id: 21, 
        type: "apartment", 
        status: "for-sale", 
        bedroom: "studio", 
        price: 96000, 
        images: [
            "../assets/apartments/Studio/IV-studio-sale/empty_studio_apartment_interior.jpeg",
            "../assets/apartments/Studio/IV-studio-sale/studio_interior.jpeg",
            "../assets/apartments/Studio/IV-studio-sale/studio_bathroom.jpg",
        ] 
    },
    //
    //------ apartment Properties END ------
    //
];

export default properties;