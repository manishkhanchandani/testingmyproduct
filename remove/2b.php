<?php
$string = 'Air Fresheners
Alcoholic Beverages
All-Purpose Cleaners
Allergy, Asthma, and Sinus Medicine
Alternative Medicine
Antifungals
Aromatherapy
Baby Bath & Hair Care
Baby Care
Baby Diapers & Diaper Care
Baby Feeding
Baby Food
Baby Medicine & Vitamins
Baby Skin Care
Baby Teeth Care
Baking Ingredients
Baking Products
Bandages & Gauzes
Bath Products
Bathroom Cleaners
Beans
Beverages
Bird Care
Bird Food
Blush
Body Art
Body Lotions, Oils, Creams, Sprays
Body Scrubs & Muds
Body Soaps & Gels
Bread
Breakfast Foods
Breath Fresheners and Gums
Burns, Wounds, Scars
Butters
Cakes
Candy
Canned Food
Canned Fruits & Vegetables
Cat Food
Cat Supplies
Cat Treats
Cheeses
Children’s Health
Chips
Chocolate
Cleaning Supplies
Cloths & Wipes
Cold, Flu, Cough, Sore Throat
Condiments
Contact Lens Care
Cookies
Cooking Oils & Sprays
Cosmetics
Crackers
Crusts, Shells, Stuffing
Cuticle Care
Dairy & Dairy-Substitute Products
Dental Care
Denture Care
Deodorants & Antiperspirants
Dessert Toppings
Detergent
Diabetic Care
Digestive Care
Dips
Dish Detergent
Dishwasher Detergent
Dog Food
Dog Health
Dog Supplies
Dog Training & Behavior Aids
Dog Treats
Drain Care
Drink Mixers
Drink Mixes
Ear Care
Eggs
Energy Drinks
Extracts, Herbs & Spices
Eye & Eyebrow Makeup
Eye Drops, Lubricants & Washes
Eyeglasses Care
Fabric Softener
Face Cleansers & Scrubs
Face Makeup
Face Moisturizers
Face Toners & Astringents
Face Treatments
Family Planning
Feminine Care
First Aid Care
Fish Care
Fish Food
Floor & Carpet Cleaners & Deodorizers
Flours
Food
Food Storage
Foot Care
Fragrances
Frozen Foods
Fruit Snacks
Fruits
Garlic
Gift Sets
Glass Cleaners
Gourmet Food Gifts
Grains
Granola Bars
Hair Care
Hair Color
Hair Conditioners
Hair Relaxers, Perms, Chemicals
Hair Removal
Hair Shampoo
Hair Styling Aids
Hand Creams & Lotions
Hand Soaps
Health & Medicine
Hemorrhoid Care
Home Brewing & Wine Making
Home Tests
Honey
Hot Cocoa
Household Polishes
Household Supplies
Ice Cream & Frozen Desserts
Incontinence Care
Insect & Pest Repellent
Insects Care
Jams & Jellies
Juices
Kitchen Cleaners
Lentils
Lice Care
Lip Care
Lip Makeup
Makeup Removers
Massage Lotions, Oils, Creams
Meat Alternatives
Meat, Poultry, Seafood Products
Medical Creams & Lotions
Milk & Milk Substitutes
Motion Sickness & Nausea
Nail Care
Nail Makeup
Nasal Care
Noodles & Pasta
Nutritional Bars, Drinks, and Shakes
Nuts
Olives
Oral Care
Packaged Foods
Pain Relief Medicine
Pain Relief Pads, Packs & Patches
Party Mix
Pastries, Desserts & Pastry Products
Personal Care
Pest Control
Pet Beds & Carriers
Pet Care
Pet Flea, Lice & Tick Control
Pet Furniture
Pet Litterbox and Cleanup
Pet Toys
Popcorn
Prepared Meals
Pudding
Reptiles & Amphibians Care
Rice
Salad Dressings
Salsas
Sauces
Seasonings
Sexual Wellness
Shaving Products
Skin Care
Sleep Aids
Small Animals Food
Smoking Cessation
Snacks
Soda
Soups & Stocks
Stain Remover
Stress Reduction
Sugars & Sweeteners
Syrups
Tea & Coffee
Therapeutic Skin Care
Tissues & Paper Towels
Training Pants
Trash Bags
Urinary Tract Infection Treatments
Vegetables
Vinegars
Vitamins & Supplements
Water
Weight Loss Products & Supplements
Wheat Flours & Meals
Yogurt';

$arr = explode("\n", $string);
foreach ($arr as $k => $v) {
	if (empty($v)) continue;
	echo "INSERT INTO `z_product_category` (`pcategory`) VALUES ('".addslashes($v)."');<br>";
}
?>